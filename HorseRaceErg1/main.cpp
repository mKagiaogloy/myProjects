#include "racing.hpp"
#include <cstdlib>


int main_kwdikas(int argc, char **argv);
int bet_kwdikas(int argc, char **argv);


int main(int argc, char **argv)
{

    return bet_kwdikas(argc, argv);
}

int main_kwdikas(int argc, char **argv)
{
    int number_of_horses = 4;
    int number_of_rounds = 10;
    if (argc == 3)
    {
        number_of_horses = atoi(argv[1]);
        number_of_rounds = atoi(argv[2]);
    }
    Racing rc(number_of_horses, number_of_rounds);
    rc.race();
    return EXIT_SUCCESS;
}

int bet_kwdikas(int argc, char **argv)
{
    int number_of_horses = 8;
    int number_of_rounds = 10;
    double money_amount;
    double money_amount2;
    string name;
    string name2;
    do
    {
        cout << "First Player, what's your name : ";
        cin >>name;
        cout << "Second Player, what's your name : ";
        cin >> name2;
        cout <<endl;
        cout << "First Player name -> "<<name<<endl;
        cout << "Second Player name -> "<<name2<<endl;
        cout <<endl;
        cout << "Give "<<name<<"'s money amount : ";
        cin >> money_amount;
        cout << "Give "<<name2<<"'s money amount : ";
        cin >> money_amount2;
        cout << endl;
    } while (money_amount < 0|| money_amount > 1000000);
    cout << name<<"'s money amount set to-->" << money_amount << endl;
    cout << name2<<"'s money amount set to-->" << money_amount2 << endl;
    cout <<endl;
    cout<<endl;
    vector<horse> race_horses;
    int choice;
    int choice2;
    string awnser;
    string awnser2;
    double bet_amount;
    double bet_amount2;
    
    vector<pair<horse, int>> standings;
    int horse_position;
    int horse_position2;
    int selected_horse_id;
    int selected_horse_id2;
    while (true)
    {

        // Κατασκευή σχεδιαστικού για την επιλογή αλόγου / Κατασκευή αντικειμένου
        Racing rc(number_of_horses, number_of_rounds);
        race_horses = rc.get_horses();
        cout << "====== Select Horse ======" << endl;
        for (int i = 0; i < race_horses.size(); i++)
        {
            cout << i << "." << race_horses[i] << endl;
        }
        cout << endl;
        cout << name <<" , Select a Horse : ";
        cin >> choice;
        cout << name2 <<" , Select a Horse : ";
        cin >> choice2;
        cout <<endl;
        cout<<endl;


        // Επιλογή αλόγου για ποντάρισμα
        if (choice,choice2 < 0 || choice,choice2 > race_horses.size() - 1)
        {
            cout << "To continue, you must choose between the above horses, but : " << endl;
        }
        else
        {
            cout << "The horse that : "<<name<<" choosed is the number  : "<<choice<< endl;
            cout << "The horse that : "<<name2<<" choosed is the number : "<<choice2<<endl;
            cout << endl;

            // Εισαγωγή στοιχήματος
            cout << "=== Do you want to bet ?=== ";
            cout << endl;
            cout << "Awnser with : (Yes) or (No) : "<<endl;            
            cout << name <<" awnser : ";
            cin >> awnser;
            cout << name2 <<" awnser : ";
            cin >> awnser2;
            cout <<endl;
            cout <<"Mr. "<<name<<" awnsered "<<awnser<<endl;
            cout <<"Mr. "<<name2<<" anwsered "<<awnser2<<endl; 
            cout << endl;
            // string weather;
            // cout<< "What's the weather ? "<<endl;
            // cout << "Pick from above"<<endl;
            // cout<< "-Rainy-Sunny-Cloudy"<<endl;
            // cin>> weather;
            // if (weather == "rainy"){
            //     cout<< "The weather is rainy"<<endl;
            // }else if(weather == "sunny"){
            //     cout << "The weather is sunny"<<endl;
            // }else if(weather == "cloudy"){
            //     cout<<"The weather is cloudy"<<endl;
            // }else {
            //     break;
            // }
            if ((awnser,awnser2) == "Yes" || (awnser,awnser2) == "yes")
            {
                cout << "==== Place a Bet ====" << endl;
                cout <<name<<" : place your bet :";
                cin >> bet_amount;
                cout <<name2<<" : place your bet :";
                cin >>bet_amount2;

                while (bet_amount < 0 || bet_amount > money_amount)
                {
                    cout << "Bet amount should be among {0 - " << money_amount <<" for you : "<<name<< "}"<< endl;
                    cout << name<<" place your bet again : ";
                    cin >> bet_amount;
                    
                }
                while (bet_amount2 < 0 || bet_amount2 > money_amount2){
                    cout << "Bet amount should be among {0 - " << money_amount2 <<" for you : "<<name2<<"}"<<endl;
                    cout << name2<<" place your bet again : ";
                    cin>> bet_amount2;
                }


                // Εκτέλεση ιπποδρομίας
                rc.race(true);
                standings = rc.get_standings();
                selected_horse_id = race_horses.at(choice).get_id();
                selected_horse_id2 = race_horses.at(choice2).get_id();
                // Εύρεση θέσης κατάταξης του επιλεγμένου αλόγου
                auto re = find_if(standings.begin(), standings.end(), [&](pair<horse, int> &p)
                                  { return p.first.get_id() == selected_horse_id; });
                horse_position = re->second;

                // Έλεγχος του τελικού ποσού του χρήστη κατα την ολοκλήρωση της ιπποδρομίας
                if (horse_position == 1){
                    money_amount += bet_amount * 2;
                }else if (horse_position > 3){
                    money_amount -= bet_amount;
                }
                cout << name<< " amount after betting(" << bet_amount << ") : " <<"Money Left : " <<money_amount << endl;
                cout << name2<< " amount after betting(" << bet_amount2 << ") : " <<"Money Left : " <<money_amount2 << endl;
                if (money_amount == 0){
                    cout <<name<<" you have no more money to place a bet. Thanks for the participation, but you can't continue. " << endl;
                    break;
                }else if(money_amount2 == 0){
                    cout << name2<<" you have no more money to place a bet. Thanks for the participation, but you can't continue."<<endl;
                    break;
                }else if((money_amount,money_amount2) ==0){
                    cout <<name<<" - and - "<<name2<<" : You both are out of money. You can't continue.";
                }
            }
            else if (awnser == "No" || awnser == "no")
            {
                cout << endl;
                cout << "Sunexizetai o agwnas xwris bet" << endl;
                rc.race(true);
            }
            else
            {
                cout << "Choose a horse again, and awnser correctly if you want to bet or no (Yes or No). : " << endl;
            }
        }
        cout << "Do you want to continue the app ? Yes / No ?" << endl;
        cin >> awnser;
        if (awnser == "No" || awnser == "no")
        {
            break;
        }
    }
    return EXIT_SUCCESS;
}