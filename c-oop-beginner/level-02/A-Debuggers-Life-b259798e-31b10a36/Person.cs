using System.Text.Json.Serialization;

public class Person
{
    [JsonPropertyName("firstName")] public string? FirstName { get; set; } = string.Empty;

    [JsonPropertyName("lastName")] public string? LastName { get; set; } = string.Empty;

    [JsonPropertyName("age")] public int Age { get; set; } = 0;

    public string Introduction()
    {
        return $"Hallo, Mijn naam is {FirstName} {LastName} en ik ben {Age} jaar oud.";
    }
}