Console.WriteLine("Van welk getal wil je de faculteit weten?");
int getal = Convert.ToInt32(Console.ReadLine());
int init_getal = getal;

for (int i = getal - 1; i > 0; i--)
{
    getal *= i;
}

Console.WriteLine("De faculteit van " + init_getal + " is " + getal);