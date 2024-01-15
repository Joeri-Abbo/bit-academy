using System;

class Program
{
    static void Main(string[] args)
    {
        string[] words = { "Bit", "Academy", "Bit-Academy", "bit", "-", "AcAdEmY" };
        int totalLowercaseCount = CountTotalLowercaseCharacters(words);
        Console.WriteLine(totalLowercaseCount);
    }

    static int CountTotalLowercaseCharacters(string[] words)
    {
        int totalLowercaseCount = 0;

        foreach (string word in words)
        {
            int lowercaseCount = Word.CountLowercaseCharacters(word);
            Console.WriteLine("Er zitten " + lowercaseCount + " kleine letters in " + word);
            totalLowercaseCount += lowercaseCount;
        }

        return totalLowercaseCount;
    }
}

class Word
{
    public static int CountLowercaseCharacters(string word)
    {
        int characterCount = 0;

        foreach (char character in word)
        {
            if ('a' <= character && character <= 'z')
            {
                characterCount++;
            }
        }

        return characterCount;
    }
}