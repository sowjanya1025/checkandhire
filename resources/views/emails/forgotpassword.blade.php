
<table style="width:100%">
    <tr>
        <th style="border:1px solid lightgrey;text-align:center;padding:0;margin:0"><img src="{{asset('images/logo.jpg')}}" width="50%" height="auto"></th>
    </tr>
    <tr>
        <td style="border:1px solid lightgrey;text-align:left;margin-top:-15px;padding:15px 10px">
            <h3 style="color:#000">Dear {{$name}},</h3>
            <p style="color:#000">Click on the link to reset your password</p>
            <p style="width:100%">http://mustb.online/API/public/resetPassword/{{$id}}/{{$token}}</p>
            <p style="color:#000">This link will expire in 10 minutes. Please do not share this link with anyone.</p>
            <i style="color:#000">
                Thanks<br>
                Support Team,<br>
                Happy Hours Club
            </i>
        </td>
    </tr>
</table>
