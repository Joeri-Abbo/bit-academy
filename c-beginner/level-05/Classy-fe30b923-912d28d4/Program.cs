using System;

class StringChecker
{
    public void CheckCharacter(string input)
    {
        if (input.Contains('a'))
        {
            Console.WriteLine("a zit in " + input);
        }
        else
        {
            Console.WriteLine("a zit niet in " + input);
        }
    }
}

class Program
{
    static void Main()
    {
        StringChecker checker = new StringChecker();

        checker.CheckCharacter("methods");
        checker.CheckCharacter("zijn");
        checker.CheckCharacter("handig");
    }
}