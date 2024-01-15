FROM mcr.microsoft.com/dotnet/sdk:7.0 AS build
WORKDIR /app

# Kopieer de csproj- en cs-bestanden en herstel de afhankelijkheden
COPY *.csproj ./
RUN dotnet restore

# Kopieer de rest van de bestanden en bouw de applicatie
COPY . ./
RUN dotnet publish -c Release -o out

# Voer de applicatie uit
CMD ["dotnet", "out/overzetten.dll"]
