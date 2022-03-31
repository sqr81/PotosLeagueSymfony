const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Host': 'nfl-team-stats.p.rapidapi.com',
		'X-RapidAPI-Key': '0c6099f9d5msh66299d19895b59ap1f9ca8jsn905a04246037'
	}
};

fetch('https://nfl-team-stats.p.rapidapi.com/v1/nfl-stats/teams/receiving-stats/offense/2021', options)
	.then(response => response.json())
	.then(data => {
        const list = data;

        list.map((item) => {
            console.log(item)
           const name = item.name;
        document.querySelector('.names').innerHTML =+ name;
        })
    })
	.catch(err => console.error(err));