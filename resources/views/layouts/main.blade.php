<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('judul')
        </h2>
        <div>
            <script type="text/javascript">
                function timedMsg() {
                    var t = setInterval("change_time();",100);
                }

                function change_time() {
                    var d = new Date();

                    var current_date = d.getDate();
                    var current_month = d.getMonth();
                    var current_year = d.getFullYear();
                    var current_hour = d.getHours();
                    var current_min = d.getMinutes();
                    var current_sec = d.getSeconds();


                    if(current_date < 10) {
                        document.getElementById('Date').innerHTML = 'Tanggal: ' + '0' + current_date + '/';
                    }else {
                        document.getElementById('Date').innerHTML = 'Tanggal: ' + current_date + '/';
                    }

                    if(current_month < 10) {
                        document.getElementById('Month').innerHTML = '0' + current_month + '/';
                    }else {
                        document.getElementById('Month').innerHTML = current_month + '/';
                    }

                    document.getElementById('Year').innerHTML = current_year;

                    document.getElementById('Hour').innerHTML = 'Waktu: ' + current_hour + ':';

                    if(current_min  < 10) {
                        document.getElementById('Minute').innerHTML= '0' + current_min + ':';
                    }else {
                        document.getElementById('Minute').innerHTML=current_min + ':';
                    }

                    if(current_sec < 10) {
                        document.getElementById('Second').innerHTML= '0' + current_sec;
                    }else {
                        document.getElementById('Second').innerHTML= current_sec;
                    }

                }
            timedMsg();
            </script>

            <table>
                <tr>
                    <td id="Date" style="color:cornflowerblue;"></td>
                    <td id="Month" style="color:cornflowerblue;"></td>
                    <td id="Year" style="color:cornflowerblue;"></td>
                    <td id="Hour" style="color:cornflowerblue;"></td>
                    <td id="Minute" style="color:cornflowerblue;"></td>
                    <td id="Second" style="color:cornflowerblue;"></td>
                </tr>
            </table>
        </div>
    </x-slot>

    @yield('container')


</x-app-layout>
