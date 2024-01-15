using System.Text.Json.Serialization;

class User
{
    [JsonPropertyName("Name")] public string? Name { get; set; }
    [JsonPropertyName("Gender")] public string? Gender { get; set; }
    [JsonPropertyName("Age")] public int? Age { get; set; }
    [JsonPropertyName("FavColor")] public string? FavColor { get; set; }
}