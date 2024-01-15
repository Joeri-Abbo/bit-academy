
Console.Write("Wat is het jaar?");
int jaar = int.Parse(Console.ReadLine());

Console.Write("Wat is het maand?");
int maand = int.Parse(Console.ReadLine());

Console.Write("Wat is het dag?");
int dag = int.Parse(Console.ReadLine());

DateTime ingevoerdeDatum = new DateTime(jaar, maand, dag);

TimeSpan verschil = DateTime.Today - ingevoerdeDatum;
int dagenVerschil = Math.Abs(verschil.Days);

Console.WriteLine($"Difference in Days: {dagenVerschil}");
