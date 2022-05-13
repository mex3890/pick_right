<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<div class="layout">
    <div class="lateral-menu">
        <div class="lateral-header">
            <img class="header-item" src="{{asset('img/logo-teste.png')}}" alt="José">
            <span class="header-item">Universe Card</span>
        </div>
        <div>
            <div class="teams">
                <div>
                    <span class="header-teams">Teams</span>
                    <hr class="header-teams">
                </div>
                <div class="card">
                    <i style="color:#7867dd" class='bx bxs-circle'></i>
                    <span>Notary</span>
                </div>
                <div class="card">
                    <i style="color:#f67c55" class='bx bxs-circle'></i>
                    <span>Notary</span>
                </div>
                <div class="card">
                    <i class='bx bx-lock-alt' ></i>
                    <span>TMM BANK</span>
                </div>
                <div class="card">
                    <i class='bx bx-lock-alt' ></i>
                    <span>OIL Section</span>
                </div>
                <div style="margin-top: 35px;">
                    <span class="header-teams">Menu</span>
                    <hr class="header-teams">
                </div>
                <div class="card">
                    <i class='bx bxs-dashboard' ></i>
                    <span>Dashboard</span>
                </div>
                <div>
                    <div class="card content">
                        <i class='bx bxs-dashboard' ></i>
                        <span>Briefings</span>
                    </div>
                    <ul class="card list">
                        <li><i style="color:#70728b" class='bx bxs-circle'></i> All</li>
                        <li><i style="color:#70728b" class='bx bxs-circle'></i> Planned</li>
                        <li><i style="color:#70728b" class='bx bxs-circle'></i> Closed</li>
                    </ul>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center" class="card">
                    <div style="display: flex">
                        <i class='bx bx-credit-card'></i>
                        <span style="margin-left: 5px">Credits</span>
                    </div>
                    <i style="color: #f67c55;" class='bx bxs-square-rounded'></i>
                </div>
                <div class="card">
                    <i class='bx bx-calendar-alt'></i>
                    <span>Calendar</span>
                </div>
                <div class="card">
                    <i class='bx bx-bar-chart-alt-2'></i>
                    <span>Reports</span>
                </div>
                <div style="margin-top: 30px">
                    <hr class="header-teams">
                </div>
                <div class="card">
                    <i class='bx bxs-cog'></i>
                    <span>Settings</span>
                </div>
            </div>
        </div>
    </div>
    <div class="lateral-card">
        <div class="card">
            <i class='bx bxs-cog'></i>
            <span>Settings</span>
        </div>
    </div>
    <div class="main-card">

    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
    * {
        margin: 0;padding: 0;
        font-family: 'Varela Round', sans-serif;
        color: #ffffff;
        text-decoration: none;
        list-style: none;
    }
    .layout {
        min-height: 100vh;
        display: grid;
        grid-template-columns: repeat(5, calc(20%));
        grid-template-areas:
                    "lateral-menu lateral-card main-card main-card main-card";
    }
    .lateral-menu {
        grid-area: lateral-menu;
        background-color: #11143d;
    }
    .lateral-menu img {
        height: 40px;
    }
    .lateral-header {
        background-color: #292b50;
        min-height: 70px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .teams {
        margin: 40px 20px 20px 20px;
    }
    .header-teams{
        color: #70728b;
        margin: auto 30px;
    }
    .header-item {
        margin: 0 5px;
    }
    .card {
        margin: 18px 10px 10px 10px;
        background-color: #292b50;
        padding: 12px;
        border-radius: 6px;
    }
    .content {
        background-color: #556ff6;
        border-radius: 6px 6px 0 0;
        margin-bottom: 0;
    }
    .list {
        margin-top: 0;
        border-radius: 0 0 6px 6px;
        font-size: 13px;
    }
    .list li {
        margin: 15px auto;
    }
    .list li i {
        font-size: 8px;
        padding-right: 5px;
    }
    .lateral-card {
        grid-area: lateral-card;
    }

    .main-card {
        grid-area: main-card;
    }
</style>
