import unittest
import pandas as pd

class TestDataframe(unittest.TestCase):

    DATAFRAME = pd.DataFrame({
        'klant_nr': [1, 2, 3, 4, 1, 3],
        'bedrag': [10, 20, 15, 30, 45, 25]
    })

    # Deze test test of het dataframe 6 rijen bevat.
    def test_bevat_zes_rijen(self):
        print("\nGetest of dataframe 6 rijen heeft.")
        size = len(self.DATAFRAME)
        self.assertTrue(size == 6, "De lengte moet 6 zijn.")

    # Deze test test of de eerste klant 55 euro heeft uitgegeven.
    def test_totaal_klant(self):
        print("\nGetest of de eerste klant 55 euro heeft uitgegeven.")
        totaal_klant = self.DATAFRAME.groupby("klant_nr")["bedrag"].sum().values[0]
        self.assertTrue(totaal_klant == 55, "De klant heeft 55 euro uitgegeven.")


if __name__ == "__main__":
    unittest.main()
