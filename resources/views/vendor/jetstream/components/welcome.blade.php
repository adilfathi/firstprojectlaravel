<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    {{-- <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div> --}}

    <div class="text-2xl">
        <script type="text/javascript">
            document.write("<font size=+3 style='color: cornflowerblue;'>");
            var day = new Date();
            var hr = day.getHours();
            if (hr >= 0 && hr < 12) {
                document.write("Selamat Pagi, {{ Auth::user()->name }}!");
            } else if (hr >= 12 && hr <= 15) {
                document.write("Selamat Siang, {{ Auth::user()->name }}!");
            } else if (hr >= 15 && hr <= 18){
                document.write("Selamat Sore, {{ Auth::user()->name }}!");
            } else {
                document.write("Selamat Malam, {{ Auth::user()->name }}!");
            }
            document.write("</font>");
        </script>
    </div>

    <div class="mt-6 text-gray-500">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus nisi, fuga excepturi odio eveniet, minus,
        sequi quia laborum nobis delectus fugiat ipsum deserunt officiis voluptatum! Repellat voluptatem obcaecati
        in porro, numquam vitae dignissimos molestiae inventore, ea ipsum autem assumenda placeat.
        Optio eaque totam nostrum inventore ad reiciendis repellat minima provident sapiente.
        Magni consectetur beatae quod cum culpa, quo blanditiis quisquam animi? Voluptatum magnam dolor
        animi quaerat illum perspiciatis minima dolore!
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 px-5">

</div>
