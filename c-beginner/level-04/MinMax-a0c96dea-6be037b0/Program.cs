int[] getallenlijst = new int[]
{
    3, 7, 10, 40, 2, 4, 8
};
int number = 0;
foreach
    (int i in array)
{
    if (i > number)
    {
        number = i;
    }
}
Console.WriteLine(number);