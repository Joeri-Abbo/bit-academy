public class Person
{
    public string FirstName { get; set; } = string.Empty;
    public string LastName { get; set; } = string.Empty;
    public int Age { get; set; } = 0;
    public string Introduction()
    {
        return $"Hallo, Mijn naam is {FirstName} {LastName} en ik ben {Age} jaar oud.";
    }
}