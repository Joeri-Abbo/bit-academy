using System;

class CubeCalculations
{
    public double CalculateVolume(double side)
    {
        return Math.Pow(side, 3);
    }

    public double CalculateSurfaceArea(double side)
    {
        return 6 * Math.Pow(side, 2);
    }
}

class Program
{
    static void Main()
    {
        CubeCalculations calculations = new CubeCalculations();
        double[] sides = { 5, 10, 20 };
        foreach (int side in sides)
        {
            Console.WriteLine("Volume = " + calculations.CalculateVolume(side) + " en oppervlakte = " +
                              calculations.CalculateSurfaceArea(side));
        }
    }
}