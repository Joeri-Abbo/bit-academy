using System;
using System.Collections.Generic;
using System.Linq;

namespace VoorbeeldApplicatie
{
    class Program
    {
        static void Main(string[] args)
        {
            List<int> getallen = Enumerable.Range(0, 6).ToList();

            ToonLijst(getallen);

            Console.WriteLine("Toevoegen en optellen met 10...");
            int som = ToevoegenEnOptellen(getallen, 10);

            Console.WriteLine($"De som is: {som}");
            ToonLijst(getallen);
        }

        static int ToevoegenEnOptellen(List<int> getallen, int getal)
        {
            getallen.Add(getal);
            return getallen.Sum();
        }

        static void ToonLijst(List<int> getallen)
        {
            Console.Write("{ ");
            for (int i = 0; i < getallen.Count; i++)
            {
                Console.Write(getallen[i]);
                if (i != getallen.Count - 1)
                {
                    Console.Write(", ");
                }
            }
            Console.Write(" }");
            Console.WriteLine();
        }
    }
}