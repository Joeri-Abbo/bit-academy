using BlackJack;
using System;

namespace BlackJack.test
{
    class Program
    {
        static void Main(string[] args)
        {
            Card card = new Card
            {
                Suit = "klaveren",
                Value = "boer"
            };

            Console.WriteLine($"{card.Value} {card.Suit}");

        }
    }
}