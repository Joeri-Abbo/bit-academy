using Rewards = Lootbox.Rewards;

Dictionary<string, int> skins = new Dictionary<string, int>()
{
    { "COMMON", 0 },
    { "RARE", 0 },
    { "EPIC", 0 },
    { "LEGENDARY", 0 }
};

for (int i = 0; i < 5; i++)
{
    skins[Rewards.GetNewSkin()]++;
}

foreach (KeyValuePair<string, int> skin in skins)
{
    if (skin.Value > 0)
    {
        Console.WriteLine(skin.Key.ToLower() + ": " + skin.Value);
    }
}