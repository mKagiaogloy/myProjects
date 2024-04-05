#include "horse.hpp"

horse::horse(int h_id, string h_name, int h_startup_speed, int h_power, int h_stamina) : id(h_id), name(h_name), startup_speed(h_startup_speed), power(h_power), stamina(h_stamina)
{
}

horse::~horse() {}

bool horse::move_forward(int step, double r)
{
    if (step == 1)
    {
        if (this->startup_speed > r)
        {
            return true;
        }
    }
    else if (step >= 2 && step <= 8)
    {
        if (this->power > r)
        {
            return true;
        }
    }
    else
    {
        double average = (double)(this->power + this->stamina) / 2;
        if (average > r)
        {
            return true;
        }
    }
    return false;
}

string horse::get_name()
{
    return this->name;
}

// Εμφάνιση χαρακτηριση χαρακτιριστικών αλόγου
ostream &operator<<(ostream &os, const horse &h)
{
    os << "[ Name:" << h.name << " Startup Speed:" << h.startup_speed << " Power:" << h.power << " Stamina:" << h.stamina << "]";
    return os;
}

int horse::get_id()
{
    return this->id;
}