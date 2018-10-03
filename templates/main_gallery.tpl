{{ title }}
    <body> 
        <main>   
            <center><h1> {{ titlepage }} </h1></center>
            <h2> {{ header }} </h2>
            {% for item in imgsfeed %}
                {{ item }}
            {% endfor %}   
        </main>
        {{ footer }}
    </body>
</html>