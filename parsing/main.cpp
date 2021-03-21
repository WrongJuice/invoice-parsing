#include <QCoreApplication>
#include <QFile>
#include <QTextStream>

#include <iostream>
#include <fstream>
#include <string>
#include <regex>



int main()
{
    /* nb : a 'token' is an element of a list
    /* ----------------------------------------------------------------------*/
    /*                            Configuration                              */
    /* ----------------------------------------------------------------------*/
    // Variables
    QTextStream out(stdout); // Allow us to print in the terminal
    QStringList listToParse; // Our list of words that we will have to parse
    QStringList spamMails = { "contact@orange.fr", "sav@orange.fr"}; // Our list of spam mails
    // Our booleans, allow us to check which data has already be picked
    bool parsedName = false;
    bool parsedMail = false;
    bool parsedPhone = false;
    bool parsedInternetAccount = false;
    bool parsedClientAccount = false;
    bool parsedBillNumber = false;
    bool parsedAddress = false;
    bool parsedBillDate = false;
    bool parsedHT = false;
    bool parsedTTC = false;
    /* Our regular expressions */
    QRegExp rxPhoneNumber("[+-]?[0-9]+"); // Check if the token is a phone number type
    QRegExp rxStartByNumber("[+-]?[0-9]+.*"); // Check if the token start by a number or a '+' '-' sign
    QRegExp rxContainNumber(".*[0-9]+.*"); // Check if the token contains a number
    QRegExp rxIsNumber("^[0-9]+$"); // Check if the token is a number
    QRegExp rxIsDate("^[0-9]+[-/][0-9]+[-/][0-9]+$"); // Check if the token is a date type
    QRegExp rxPrice ("^[TTC|HT]?-?€?-?[0-9]+[\.,][0-9][0-9][€]?[TTC|HT]?$"); // Check if the token is a price type
    QRegExp rxNotEmpty(".*[a-ZA-Z0-9]+.*"); // Check if the token is not empty
    QRegExp rxIdentity("^m|M|mme|MME$"); // Check if the token describe a gender
    QRegExp rxUppercase("^[A-Z]+$"); // Check if the token is in uppercase
    QRegExp rxMail("^.*@.*[.].*$"); // Check if the token is a mail

    /* ----------------------------------------------------------------------*/
    /*                              Reading Bill                             */
    /* ----------------------------------------------------------------------*/

    QFile file("D:\\Bureau\\Qt-Parsing\\test-parsing\\facture_bouygues.txt"); // Our bill in a .txt format
    if(!file.open(QIODevice::ReadOnly | QIODevice::Text)) out << "Error while loading the file..." << "\n"; // Check if the file open
    QString file2 = "n° de facture : 05C247R247 19] 4- 1H12 \n date de facture : 26/12/1  \n M PLATON SAMUEL \n ETAGE O APPARTEMENT 17 ENSEMBLE RESID FUN 4 BATIMENT S 15 R ANDRE GABARET 17000 LA ROCHELLE \n coucou c moi";

    QTextStream flux(&file2); // Creating our flux of the file
    flux.setCodec("UTF-8"); // Setting the codec on UTF-8

    while(!flux.atEnd()){ // Browse the flux until the end
        QString line = flux.readLine(); // Reading the lines one by one
        QStringList list; // We put the each line in a list of string
        if (rxNotEmpty.indexIn(line) == 0){ // We will add only non empty lines to our list
            list = line.split(' '); // We put the line in a lost of words
            for (int i = 0; i < list.size(); ++i) { // We travel the list of words
                QString word = list[i].toLower(); // We will standardise some words
                if(word == "numero" || word == "n°" || word == "numéro") listToParse.append("numero"); // Standardise the word 'numero'
                else if (word == "mobile" || word == "téléphone" || word == "tel" || word == "ligne") listToParse.append("telephone"); // Standardise phone number
                else if (word == "rue" || word == "r") listToParse.append("RUE"); // Standardise 'rue' A VIRER
                else if (word == "prix" || word == "total" || word == "montant") listToParse.append("prix"); // Standardise the price
                else listToParse.append(list[i]); // Else we add the word to our list
            }
            listToParse.append(" "); // We set a space in our list when we reach a new line
        }
    }

    /* We print our list of words */
    for (int i = 0; i < listToParse.size(); ++i) {
        out << listToParse[i] << "\n";
    }

    //file.close(); // Close file


    /* ----------------------------------------------------------------------*/
    /*                              Treatment                                */
    /* ----------------------------------------------------------------------*/

    QMap<QString, QString> data; // Our data from the bill
    QList<QString>::iterator it; // Our iterator used to travel the list
    for(it = listToParse.begin(); it != listToParse.end(); it++) // Browse the list token by token
    {
        // Get the identity if still not done
                // If the token is "m" or "mme"
                if( rxIdentity.indexIn(*it) == 0 && parsedName == false) {
                    data["Identity"] = *it;
                    it++;
                    while( (*it) != " " && rxContainNumber.indexIn(*it) == -1){
                       data["Identity"] += " "+*it;
                       it++;
                    }
                    parsedName = true; // We say that we have got the Identity
                }

                // Get the mail if still not done
                // If the token contains '@' and is not a spam mail
                else if( rxMail.indexIn(*it) == 0 && !spamMails.contains(*it) && parsedMail == false) {
                    data["E-Mail"] = *it;  // We get the mail
                    parsedMail = true; // We say that we have got the E-Mail
                }

                // Get the Phone Number if still not done
                // If the token is 'telephone'
                else if( (*it).contains("telephone") && parsedPhone == false)
                {
                    while( rxPhoneNumber.indexIn(*it) == -1 ) it++; // We move forward until we reach 0x or +xx
                    data["Phone"] = *it+" ";  //  We add the first token number
                    it++;
                    QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the next tokens
                    while( rxPhoneNumber.indexIn(*subIt) == 0) // We move forward until we have a non-number token
                    {
                        data["Phone"] += *subIt+" "; // We add the number token
                        subIt++; // We move forward on 1 token
                    }
                    parsedPhone = true; // We say that we have got the Phone Number
                }

                // get the adress if still not done
                // from a token in uppercase
                else if(rxUppercase.indexIn(*it) == 0 && parsedAddress == false)
                {
                    it--; // Browse the token before
                    while(rxUppercase.indexIn(*it) == 0 || rxIsNumber.indexIn(*it) == 0){ // While the token is a number or is in uppercase, we go 1 token before
                        it--;
                    }
                    it++; // We skip the wrong token
                    data["Address"] = *it+" "; // We take the first token
                    it++;
                    while(rxUppercase.indexIn(*it) == 0 || rxIsNumber.indexIn(*it) == 0 || *it == " "){ // While the token is in uppercase or a number...
                        data["Address"] += *it+" "; // We add it
                        it++;
                    }
                    parsedAddress = true; // We say that we have got the Adress
                }

                // Get the date of bill if still not done
                // from the token 'date'
                else if ( *it == "date" && parsedBillDate == false)
                {
                    it = it+2; // We jump the 'de' token A CHANGER
                    if ( *it == "facture" )
                    {
                        while( rxIsDate.indexIn(*it) == -1) it++; // While the token is not a date type, we move forward
                        data["Date"] = *it; // We add the date in our data
                        parsedBillDate = true; // We say that we have got the date of bill
                    }
                }

                // Get the price of bill if still not done
                // From the 'prix' token
                else if ( *it == "prix" && parsedHT == false && parsedTTC == false)
                {
                   while (rxPrice.indexIn(*it) == -1) it++; // We move forward until we get a price
                   QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the next tokens and check if there is another price behind
                   subIt++;
                   int i = 0;
                   while (rxPrice.indexIn(*subIt) == -1 && i < 5){ subIt++; i++; } // We check if there is another price on the five tokens behind
                   if(rxPrice.indexIn(*subIt) == 0){ // If there is another price behind, we suppose it's HT and TTC

                      data["HT"] = *it;
                      data["TTC"] = *subIt;
                      parsedHT = true;
                      parsedTTC = true;
                   }
                   else {
                       data["TTC"] = *it; // Else we suppose we only have the TTC price
                       parsedTTC = true; // We say that we have got the price of bill
                   }
                }

                // Get the price TTC of bill if still not done
                // We check if the token is 'TTC'
                else if ( (*it).contains("TTC") && parsedTTC == false) // We check if the token is named 'TTC'
                {
                   QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the tokens before 'TTC'
                   for(int i = 0; i < 5; i++){ // We go and check the 5 tokens before
                    if(rxPrice.indexIn(*subIt) == 0) { // If it's a price, we take it
                        i = 5;
                        parsedTTC = true;
                        data["TTC"] = *subIt;
                    }
                    else if(*subIt == "HT") i = 5; // If the token is 'HT', we leave because we have gone too far
                    else subIt--;
                   }

                    if(!parsedTTC){ // If we didn't succeed with the tokens before
                         QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the tokens after 'TTC'
                         for(int i = 0; i < 5; i++){ // We go and check the 5 tokens after
                            if(rxPrice.indexIn(*subIt) == 0) { // If it's a price, we take it
                              i = 5;
                              parsedTTC = true;
                              data["TTC"] = *subIt;
                            }
                          else if(*subIt == "HT") i = 5;
                          else subIt++;
                         }
                    }
                }

                // Get the price HT of bill if still not done
                // We check if the token is'TTC'
                else if ( (*it).contains("HT") && parsedHT == false) // We check if the token is named 'HT'
                {
                   QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the tokens before 'TTC'
                   for(int i = 0; i < 5; i++){ // We go and check the 5 tokens before
                    if(rxPrice.indexIn(*subIt) == 0) { // If it's a price, we take it
                        i = 5;
                        parsedHT = true;
                        data["HT"] = *subIt;
                    }
                    else if(*subIt == "TTC") i = 5; // If the token is 'TTC', we leave because we have gone too far
                    else subIt--;
                   }

                    if(!parsedHT){ // If we didn't succeed with the tokens before
                         QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the tokens after 'HT'
                         for(int i = 0; i < 5; i++){ // We go and check the 5 tokens after
                            if(rxPrice.indexIn(*subIt) == 0) { // If it's a price, we take it
                              i = 5;
                              parsedTTC = true;
                              data["HT"] = *subIt;
                            }
                          else if(*subIt == "TTC") i = 5;
                          else subIt++;
                         }
                    }
                }



                // Get all the 'numbers'
                // If the token contains 'numero'
                else if( (*it).contains("numero")){
                    // We will study the tokens behind 'numero'
                    QList<QString>::iterator subIt = it; // Create a secondary iterator to study the next tokens
                    QString studiedString; // Our string to study
                    while( rxStartByNumber.indexIn(*subIt) == -1) // We move forward until we got a token that start by a number
                    {
                        studiedString += *subIt+" ";
                        *subIt++;
                    }


                    // If in the string to study there is 'compte internet', so we will get it
                    if( studiedString.toLower().contains("compte internet") && parsedInternetAccount == false)
                    {
                        it = subIt; // If we have a result, the set the iterator on the right token
                        while( rxStartByNumber.indexIn(*it) == -1) it++; // We move forward until we don't have a token number
                        data["Internet_account"] = *it; // We add the first number of the internet number
                        it++;
                        QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the next tokens
                        while( rxStartByNumber.indexIn(*subIt) == 0) // We add all the tokens that start by a number behind
                        {
                            data["Internet_account"] += *subIt+" ";
                            subIt++;
                        }
                        parsedInternetAccount = true; // We say that we have got the Internet account number
                    }

                    // If in the string to study there is 'client', so we will get the number of the client account
                    else if( studiedString.toLower().contains("client") && parsedClientAccount == false)
                    {
                        it = subIt; // If we have a result, the set the iterator on the right token
                        while( rxStartByNumber.indexIn(*it) == -1) it++; // We move forward until we don't have a token number
                        data["Customer_account"] = *it+" "; // We add the first number of the customer account
                        it++;
                        QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the next tokens
                        while( rxStartByNumber.indexIn(*subIt) == 0)  // We add all the tokens that start by a number behind
                        {
                            data["Customer_account"] += *subIt+" ";
                            subIt++;
                        }
                        parsedClientAccount = true; // We say that we have got the Client account number
                    }

                    // If in the string to study there is 'facture, so we will get the bill number
                    else if( studiedString.toLower().contains("facture") && parsedBillNumber == false)
                    {
                        it = subIt; // If we have a result, the set the iterator on the right token
                        while( rxStartByNumber.indexIn(*it) == -1) it++; // We move forward until we don't have a token number
                        data["Bill_number"] = *it; // We add the first number of the customer account
                        it++;
                        QList<QString>::iterator subIt = it; // Create a secondary iterator to browse the next tokens
                        while( rxStartByNumber.indexIn(*subIt) == 0)  // We add all the tokens that start by a number behind
                        {
                            data["Bill_number"] += *subIt+" ";
                            subIt++;
                        }
                        parsedBillNumber = true; // We say that we have got the bill number
                    }
                }
            }

    /* ----------------------------------------------------------------------*/
    /*                              Data Printing                            */
    /* ----------------------------------------------------------------------*/

    /* We print our data */
    QMapIterator<QString, QString> i(data);
    while (i.hasNext())
    {
        i.next();
        out << i.key() << " : " << i.value() << "\n";
    }

   }


/* AVANCEMENT DES DATA
 * ! Mes while bouclent dans le vide s'ils ne trouvent pas ce qu'ils cherchent 'les it++'
 * E-Mail : Liste des mails indésirables
 * Rue : Selon les majuscules
 * Prix TTC et HT : plus sécurisés
 * Jouer avec les espaces partt
 * */
