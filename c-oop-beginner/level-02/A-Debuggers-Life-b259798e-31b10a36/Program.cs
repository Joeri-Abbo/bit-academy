

class Program
{
    static void Main(string[] args)
    {
        using System.Text.Json;

        List<Person> people = JsonSerializer.Deserialize<List<Person>>(File.ReadAllText("people.json"));

        foreach (var person in people)
        {
            Console.WriteLine(person.Introduction());
        }
    }
}