using System;
using System.Collections;

Hashtable grassBlock = new Hashtable
{
    { "stackable", true },
    { "luminant", false },
    { "snow", false },
    { "y", 120 },
    { "x", 96 },
    { "z", 347 }
};

grassBlock["snow"] = true;
grassBlock["y"] = 186;
grassBlock["z"] = 1041;


foreach (DictionaryEntry block in grassBlock)
{
    Console.WriteLine("{0}: {1}", block.Key, block.Value);
}