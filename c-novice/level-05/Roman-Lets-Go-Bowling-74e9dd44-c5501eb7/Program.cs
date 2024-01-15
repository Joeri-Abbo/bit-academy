using Humanizer;
using System;

class Program
{
    static void Main()
    {
        Console.Write("Voer een getal in: ");
        string? input = Console.ReadLine();

        if (int.TryParse(input, out int number))
        {
            try
            {
                string romanNumeral = number.ToRoman();
                Console.WriteLine($"In Romeinse cijfers is dit: {romanNumeral}");
            }
            catch (ArgumentOutOfRangeException ex)
            {
                Console.WriteLine(ex.Message);
            }
        }
        else
        {
            Console.WriteLine("Ongeldige invoer. Voer een geldig getal in.");
        }
    }
}