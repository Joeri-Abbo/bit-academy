List<string> hobbies = new List<string>();

for (int i = 0; i < 3; i++)
{
    Console.WriteLine("Wat is je hobby?");
    string? hobby = Console.ReadLine();
    hobbies.Add(hobby ?? ""); // Use empty string if hobby is null
}

Console.WriteLine("Jouw hobbies zijn: " + string.Join(", ", hobbies));