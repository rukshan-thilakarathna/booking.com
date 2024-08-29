 <div class="bg-white rounded-top shadow-sm mb-4 rounded-bottom">

    @if(Auth::user()->profile_verified == 0)

        <div style="display: flex;align-items: center;">
            <iframe style="width: 430px;height: 430px;" src="https://lottie.host/embed/21770f04-20bc-4b5a-b0ec-84d889748a23/YF1vgFyhzp.json"></iframe>
            <div>
                <h1>Unverified {{Auth::user()->role}} </h1>
                <p>It looks like your account is currently unverified. To fully unlock all features and start managing your properties, please verify your account. Head over to the Profile section in the dashboard to complete the verification process.</p>
            </div>
        </div>

    @else

        <div style="display: flex;align-items: center;">
            <iframe style="width: 430px;height: 430px;" src="https://lottie.host/embed/21770f04-20bc-4b5a-b0ec-84d889748a23/YF1vgFyhzp.json"></iframe>
            <div>
                <h1>verified {{Auth::user()->role}} </h1>
                <p> hellow , welcome to bartebed booking site.</p>
            </div>
        </div>

    @endif

   

</div>
