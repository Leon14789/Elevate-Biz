<h1> Projetc: ELEVATE BIZ</h1>

<h2>Summary:</h2>

<p>
    The project is a comprehensive management system that offers functionality to manage users, electronic point records and statistical data. It uses PHP with Laravel as a backend framework, MySQL as a database and HTML, JavaScript and CSS to create visual interfaces. With an access hierarchy and several visual themes, the system is able to meet the administration and monitoring needs of companies of different sizes and sectors.
</p>

<hr />

<p>
    The project in question is a comprehensive management system, developed to carry out CRUD operations (creation, reading, updating and deletion) of users, as well as the management and monitoring of employees' electronic points. It offers an intuitive and user-friendly interface for administrators and employees to manage their activities and interact with system data.
</p>

<h2> Main Features: </h2> 

    

    User CRUD Operations: The system allows creating, editing, viewing and deleting user information. Each user has attributes such as name, title, hierarchy, contact details, etc.

    Electronic Point Registration: Employees can register their arrivals and departures through the system, allowing precise control of hours worked. Records are associated with each user and can be managed centrally.

    Histórico de Pontos: O sistema mantém um histórico detalhado dos registros de pontos de cada usuário, permitindo que os funcionários e administradores visualizem os registros anteriores.

    Points History: The system maintains a detailed history of each user's points records, allowing employees and administrators to view previous records.

    Hierarchy System: Users are organized in a hierarchy including different access levels such as administrator, employee and others. The higher the hierarchical level, the more information and functionality is available.

    Statistical Analysis: Top-level administrators have access to comprehensive statistics, including the number of total employees, who has yet to record points of the day, and records of all users for up to 10 years.

    Visual Themes: The system offers a choice of visual themes, including the default theme with company colors, a minimalist theme, a dark theme (darkula) and a night theme to customize the user experience.

Technologies Used:

    Backend: The project is built primarily in PHP, a language widely used for web development. The Laravel framework is adopted as the backend framework, which provides a robust architecture and facilitates development, route management, authentication and interaction with the database.

    Database: The system uses the MySQL database to store all user information, point records and history.

    Frontend: User interfaces are built using a combination of HTML, JavaScript and CSS. These technologies are used to create interactive web pages, form interfaces, graphics and other visual elements.

## In order to enjoy 100% of the project's capacity, you must run the following commands ##
    npm i
    composer i
    php artisan breeze:install blade
    php artisan migrate --seed
    npm install
    npm run dev