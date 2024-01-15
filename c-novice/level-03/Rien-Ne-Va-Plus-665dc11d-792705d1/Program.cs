using System;

namespace RouletteGame
{
    class Program
    {
        static void Main(string[] args)
        {
            int chips = 10;

            while (chips > 0)
            {
                chips = SetChipsOnNumbers(chips);
            }

            Console.WriteLine("GAME OVER");
        }

        static int SetChipsOnNumbers(int chips)
        {
            while (chips > 0)
            {
                Console.WriteLine($"Je hebt {chips} chips. Voer je inzet in (1-36) of STOP om te stoppen:");
                string input = Console.ReadLine();

                if (int.TryParse(input, out int bet) && bet >= 1 && bet <= 36)
                {
                    if (chips >= 1)
                    {
                        chips--;
                        Console.WriteLine($"Je hebt 1 chip ingezet op {bet}.");
                        Console.WriteLine();
                    }
                    else
                    {
                        Console.WriteLine("Je hebt geen chips meer om in te zetten.");
                        Console.WriteLine();
                    }
                }
                else
                {
                    Console.WriteLine("Ongeldige invoer. Voer een getal tussen 1 en 36 in of STOP om te stoppen.");
                    Console.WriteLine();
                }
            }

            Console.WriteLine("Rien ne va plus!");
            int randomNumber = new Random().Next(1, 37);

            int winnings = CheckWinningNumber(randomNumber, chips);
            chips += winnings;

            Console.WriteLine($"Het winnende nummer is: {randomNumber}");
            Console.WriteLine($"Je hebt {winnings} chips gewonnen.");
            Console.WriteLine();
            return chips;
        }

        static int CheckWinningNumber(int randomNumber, int chips)
        {
            int winnings = 0;

            Console.WriteLine("Controleer je inzetten...");


            if (randomNumber % 2 == 0 && randomNumber >= 1 && randomNumber <= 18)
            {
                winnings += chips;
            }

            return winnings;
        }
    }
}