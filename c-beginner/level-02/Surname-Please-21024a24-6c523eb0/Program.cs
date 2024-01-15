Console.WriteLine("Wat is je voornaam?");
string FirstName = Console.ReadLine()!;

Console.WriteLine("Wat is je achternaam?");
string LastName = Console.ReadLine()!;
string Name = FirstName + ' ' + LastName;
Console.WriteLine("Jouw naam is " + Name);