Console.WriteLine("Wat is het wachtwoord?");
string Password = Console.ReadLine()!;

if (Password == "baas")
{
    Console.WriteLine("Totale toegang");
}
else if (Password == "medewerker")
{
    Console.WriteLine("Gedeeltelijke toegang");
}
else
{
    Console.WriteLine("Geen toegang");
}