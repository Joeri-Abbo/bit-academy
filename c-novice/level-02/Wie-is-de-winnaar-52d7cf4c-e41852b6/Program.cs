Console.WriteLine("Wat is de score van speler 1?");
string? input1 = Console.ReadLine();
int player_1;
int.TryParse(input1, out player_1);

Console.WriteLine("Wat is de score van speler 2");
string? input2 = Console.ReadLine();
int player_2;
int.TryParse(input2, out player_2);

if (player_1 > player_2)
{
    Console.WriteLine("Speler 1 heeft gewonnen");
}
else if (player_1 < player_2)
{
    Console.WriteLine("Speler 2 heeft gewonnen");
}
else
{
    Console.WriteLine("Gelijkspel");
}