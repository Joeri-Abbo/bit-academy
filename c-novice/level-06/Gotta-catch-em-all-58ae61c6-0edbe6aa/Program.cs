using DotNetEnv;
using MySqlConnector;
using Newtonsoft.Json;

class Program
{
    static async Task Main(string[] args)
    {
        Env.Load(".env");

        string connectionString =
            $"server={Env.GetString("DB_SERVER")};port={Env.GetString("DB_PORT")};database={Env.GetString("DB_DATABASE")};user={Env.GetString("DB_USER")};password={Env.GetString("DB_PASSWORD")};";

        await CreatePokemonTableIfNotExists(connectionString);

        int pokemonCount = await FetchAndInsertPokemons(connectionString, 1, 151);

        Console.WriteLine($"Total Pokemon Count: {pokemonCount}");
    }

    static async Task CreatePokemonTableIfNotExists(string connectionString)
    {
        using (MySqlConnection connection = new MySqlConnection(connectionString))
        {
            await connection.OpenAsync();

            string query = @"
                CREATE TABLE IF NOT EXISTS Pokemons (
                    ID INT,
                    Name VARCHAR(255),
                    weight INT,
                    height INT,
                    PRIMARY KEY (ID)
                );";

            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                await command.ExecuteNonQueryAsync();
            }
        }
    }

    static async Task<int> FetchAndInsertPokemons(string connectionString, int start, int end)
    {
        if (end < start)
        {
            return 0;
        }

        int pokemonCount = 0;

        using (MySqlConnection connection = new MySqlConnection(connectionString))
        {
            await connection.OpenAsync();

            for (int i = start; i <= end; i++)
            {
                string pokemonApiUrl = $"https://pokeapi.co/api/v2/pokemon/{i}";
                Pokemon pokemon = await FetchPokemonFromApi(pokemonApiUrl);
                if (pokemon != null)
                {
                    await InsertOrUpdatePokemonInDatabase(connection, pokemon);
                    pokemonCount++;
                }
            }
        }

        return pokemonCount;
    }

    static async Task<Pokemon> FetchPokemonFromApi(string apiUrl)
    {
        using (HttpClient client = new HttpClient())
        {
            HttpResponseMessage response = await client.GetAsync(apiUrl);
            if (response.IsSuccessStatusCode)
            {
                string json = await response.Content.ReadAsStringAsync();
                Pokemon pokemon = JsonConvert.DeserializeObject<Pokemon>(json);
                return pokemon;
            }
        }

        return null;
    }

    static async Task InsertOrUpdatePokemonInDatabase(MySqlConnection connection, Pokemon pokemon)
    {
        string selectQuery = "SELECT COUNT(*) FROM Pokemons WHERE ID = @ID;";

        using (MySqlCommand selectCommand = new MySqlCommand(selectQuery, connection))
        {
            selectCommand.Parameters.AddWithValue("@ID", pokemon.ID);
            long existingCount = (long)await selectCommand.ExecuteScalarAsync();

            if (existingCount > 0)
            {
                string updateQuery = @"
                    UPDATE Pokemons 
                    SET Name = @Name, weight = @Weight, height = @Height
                    WHERE ID = @ID;";

                using (MySqlCommand updateCommand = new MySqlCommand(updateQuery, connection))
                {
                    updateCommand.Parameters.AddWithValue("@Name", pokemon.Name);
                    updateCommand.Parameters.AddWithValue("@Weight", pokemon.Weight);
                    updateCommand.Parameters.AddWithValue("@Height", pokemon.Height);
                    updateCommand.Parameters.AddWithValue("@ID", pokemon.ID);

                    await updateCommand.ExecuteNonQueryAsync();
                }
            }
            else
            {
                string insertQuery = @"
                    INSERT INTO Pokemons (ID, Name, weight, height)
                    VALUES (@ID, @Name, @Weight, @Height);";

                using (MySqlCommand insertCommand = new MySqlCommand(insertQuery, connection))
                {
                    insertCommand.Parameters.AddWithValue("@ID", pokemon.ID);
                    insertCommand.Parameters.AddWithValue("@Name", pokemon.Name);
                    insertCommand.Parameters.AddWithValue("@Weight", pokemon.Weight);
                    insertCommand.Parameters.AddWithValue("@Height", pokemon.Height);

                    await insertCommand.ExecuteNonQueryAsync();
                }
            }
        }
    }
}