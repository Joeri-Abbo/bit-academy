Dictionary<string, List<string>> bezittingen = new Dictionary<string, List<string>>()
{
    { "buidel", new List<string>() { "touw", "vuursteen", "zakmes" } },
    { "rugzak", new List<string>() { "panfluit", "dolk", "slaapzak", "appel" } }
};

bezittingen["buidel"].Remove("zakmes");
bezittingen.Add("portemonnee", new List<string>());
bezittingen["rugzak"].Sort();

// Loop door alle bezittingen
foreach (KeyValuePair<string, List<string>> bezitting in bezittingen)
{
    Console.WriteLine("Inhoud" + bezitting.Key + ":");
    if (bezitting.Value.Count == 0)
    {
        Console.WriteLine("Leeg");
    }
    else
    {
        Console.WriteLine(string.Join(", ", bezitting.Value));
    }
}