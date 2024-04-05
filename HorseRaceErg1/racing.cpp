#include "racing.hpp"
#define DNF 999
#include <string>

mt19937 mt(chrono::steady_clock::now().time_since_epoch().count());

void press_enter()
{
    cout << "Press [Enter] to continue....";
    cin.get();
}

void interrupt()
{
    this_thread::sleep_for(seconds(1));
    cout << endl;
}

Racing::Racing(int number_of_horses, int number_of_rounds) : n_horses(number_of_horses), rounds(number_of_rounds)
{
    auto random_value = uniform_int_distribution<int>(50, 100);
    vector<string> names{"Blitz", "Bolt", "Goliath", "Hercules", "Rogue", "Danger", "Raider", "Storm", "Nitro", "Hulk"};
    shuffle(names.begin(), names.end(), default_random_engine(chrono::steady_clock::now().time_since_epoch().count()));
    for (int i = 0; i < this->n_horses; i++)
    {
        horse a_horse(i + 1, names[i], random_value(mt), random_value(mt), random_value(mt));
        horses.push_back(a_horse);
        position.push_back(0);
        standings.push_back(make_pair(a_horse, DNF));
    }
}

Racing::~Racing() {}

void Racing::race(bool auto_race)
{
    mt19937 gen(steady_clock::now().time_since_epoch().count());
    const int steps_will_be_made = this->rounds * 2;
    auto rand_real = uniform_real_distribution<double>(0, 100);
    bool can_be_moved;
    this->drawing();
    auto_race ? interrupt() : press_enter();
    bool finish = false;
    int rank = 1;
    for (int i = 0; i < steps_will_be_made; i++)
    {
        for (int j = 0; j < this->horses.size(); j++)
        {
            if (this->position[j] == this->rounds - 1)
            {

                // Τοποθέτηση αλόγου σε θέση κατάταξης , σε περίπτωση ολοκλρήρωσης της κούρσας του αλόγου
                if (this->standings[j].second == DNF)
                {
                    this->standings[j].second = rank;
                    rank++;
                    if (this->is_race_over())
                    {
                        finish = true;
                        break;
                    }
                }
                continue;
            }

            // Έλεγχος μετακίνησης του αλόγου στον επόμενο γύρο
            can_be_moved = this->horses[j].move_forward(this->position[j], rand_real(gen));
            if (can_be_moved)
            {
                this->position[j]++;
            }
        }
        if (finish)
            break;
        this->drawing();
        auto_race ? interrupt() : press_enter();
    }
    this->display_standings();
}

void Racing::drawing()
{
    for (int i = 0; i < this->horses.size(); i++)
    {
        cout << "|";
        for (int j = 0; j < this->rounds; j++)
        {
            if (position[i] == j)
            {
                cout << i;
            }
            else
                cout << ".";
        }
        cout << "|" << this->standings[i].first.get_name() << endl;
    }
}

void Racing::display_standings()
{
    // Ταξινόμηση της κατάταξης των αλόγων σε αύξουσα σειρά

    sort(this->standings.begin(), this->standings.end(), [](auto &left, auto &right)
         { return left.second < right.second; });

    cout << "====== Standings =======" << endl;
    for (int i = 0; i < this->standings.size(); i++)
    {
        cout << this->standings[i].first.get_name() << "->" << (this->standings[i].second == DNF ? "DNF" : to_string(this->standings[i].second)) << endl;
    }
    cout << endl;
}

// Έλεγχος ολοκλήρωσης της κούρσας
bool Racing::is_race_over()
{
    int horses_finished = 0;
    for (auto x : this->standings)
    {
        if (x.second != DNF)
            horses_finished++;
    }

    return horses_finished == this->standings.size();
}

vector<horse> Racing::get_horses()
{
    return this->horses;
}

vector<pair<horse, int>> Racing::get_standings()
{
    return this->standings;
}