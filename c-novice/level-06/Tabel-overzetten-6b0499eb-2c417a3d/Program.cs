using DotNetEnv;
using MySqlConnector;
using Newtonsoft.Json;

class Program
{
    static void Main(string[] args)
    {
        Env.Load(".env");

        string connectionString =
            $"server={Env.GetString("DB_SERVER")};port={Env.GetString("DB_PORT")};database={Env.GetString("DB_DATABASE")};user={Env.GetString("DB_USER")};password={Env.GetString("DB_PASSWORD")};";

        string jsonFilePath = "users.json";

        CreateUsersTableIfNotExists(connectionString);

        List<User> users = LoadUsersFromJson(jsonFilePath);
        int usersAdded = InsertUsersToDatabase(connectionString, users);

        Console.WriteLine($"{usersAdded} users added to the database.");

        Console.ReadLine();
    }

    static List<User> LoadUsersFromJson(string jsonFilePath)
    {
        string json = File.ReadAllText(jsonFilePath);

        if (string.IsNullOrEmpty(json))
            return new List<User>();
        List<User> users = JsonConvert.DeserializeObject<List<User>>(json);

        return users ?? new List<User>();
    }

    static void CreateUsersTableIfNotExists(string connectionString)
    {
        using (MySqlConnection connection = new MySqlConnection(connectionString))
        {
            connection.Open();

            string query = @"
        CREATE TABLE IF NOT EXISTS Users (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(255),
            Gender VARCHAR(1),
            Age INT,
            FavColor VARCHAR(50)
        );";

            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                command.ExecuteNonQuery();
            }
        }
    }


    static int InsertUsersToDatabase(string connectionString, List<User> users)
    {
        int usersAdded = 0;

        using (MySqlConnection connection = new MySqlConnection(connectionString))
        {
            connection.Open();

            foreach (User user in users)
            {
                string query =
                    "INSERT INTO Users (Name, Gender, Age, FavColor) VALUES (@Name, @Gender, @Age, @FavColor)";

                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Name", user.Name);
                    command.Parameters.AddWithValue("@Gender", user.Gender);

                    if (user.Age.HasValue)
                        command.Parameters.AddWithValue("@Age", user.Age);
                    else
                        command.Parameters.AddWithValue("@Age", DBNull.Value);

                    command.Parameters.AddWithValue("@FavColor", user.FavColor);

                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                        usersAdded++;
                }
            }
        }

        return usersAdded;
    }
}