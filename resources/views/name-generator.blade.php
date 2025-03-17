<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnuggleNames - Name Generator</title>
    <script>
        async function generateName() {
            const category = document.getElementById("category").value;
            const type = document.getElementById("type").value;
            const theme = document.getElementById("theme").value;
            
            let url = `/generate-name?category=${category}&type=${type}&theme=${theme}`;

            try {
                const response = await fetch(url);
                const data = await response.json();

                if (data && data.name) {
                    document.getElementById("result").innerText = "Generated Name: " + data.name;
                } else {
                    document.getElementById("result").innerText = "No name found. Try different filters!";
                }
            } catch (error) {
                document.getElementById("result").innerText = "Error fetching name!";
            }
        }
    </script>
</head>
<body>
    <h1>SnuggleNames - Name Generator</h1>
    
    <label for="category">Category:</label>
    <select id="category">
        <option value="pet">Pet</option>
        <option value="partner">Partner</option>
    </select>

    <label for="type">Type:</label>
    <select id="type">
        <option value="dog">Dog</option>
        <option value="cat">Cat</option>
        <option value="bird">Bird</option>
        <option value="fish">Fish</option>
        <option value="boyfriend">Boyfriend</option>
        <option value="girlfriend">Girlfriend</option>
        <option value="neutral">Neutral</option>
    </select>

    <label for="theme">Theme:</label>
    <select id="theme">
        <option value="cute">Cute</option>
        <option value="funny">Funny</option>
        <option value="unique">Unique</option>
        <option value="classic">Classic</option>
        <option value="trendy">Trendy</option>
        <option value="romantic">Romantic</option>
        <option value="playful">Playful</option>
        <option value="cool">Cool</option>
    </select>

    <button onclick="generateName()">Generate Name</button>
    
    <h2 id="result"></h2>
</body>
</html>
