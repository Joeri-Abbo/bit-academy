class Program
{
    static void Main(string[] args)
    {
        Calculator calculator = new Calculator();

        Console.WriteLine("Getal a:");
        string? input1 = Console.ReadLine();
        int getal_1;
        int.TryParse(input1, out getal_1);

        Console.WriteLine("Getal b:");
        string? input2 = Console.ReadLine();
        int getal_2;
        int.TryParse(input2, out getal_2);

        Console.WriteLine("a x b = " + calculator.Multiply(getal_1, getal_2));
    }
}

class Calculator
{
    public int Multiply(int a, int b)
    {
        return a * b;
    }
}