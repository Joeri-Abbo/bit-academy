using System;

namespace Lootbox
{
    class Rewards
    {
        public static string GetNewSkin()
        {
            int rand = (new Random()).Next(101);

            if (rand == 1)
            {
                return "LEGENDARY";
            }
            else if (rand <= 5)
            {
                return "EPIC";
            }
            else if (rand <= 40)
            {
                return "RARE";
            }
            else
            {
                return "COMMON";
            }
        }
    }
}
