<option value="Christianity" @if($user->religion == "Christianity") selected @endif >Christianity</option>
<option value="Islam" @if($user->religion == "Islam") selected @endif >Islam</option>
<option value="Hinduism" @if($user->religion == "Hinduism") selected @endif >Hinduism</option>
<option value="Buddhism" @if($user->religion == "Buddhism") selected @endif >Buddhism</option>
<option value="Sikhism" @if($user->religion == "Sikhism") selected @endif >Sikhism</option>
<option value="Judaism" @if($user->religion == "Judaism") selected @endif >Judaism</option>
<option value="Bahá'í Faith" @if($user->religion == "Bahá'í Faith") selected @endif >Bahá'í Faith</option>
<option value="Jainism" @if($user->religion == "Jainism") selected @endif >Jainism</option>
<option value="Shintoism" @if($user->religion == "Shintoism") selected @endif >Shintoism</option>
<option value="Taoism" @if($user->religion == "Taoism") selected @endif >Taoism</option>
<option value="Confucianism" @if($user->religion == "Confucianism") selected @endif >Confucianism</option>
<option value="Zoroastrianism" @if($user->religion == "Zoroastrianism") selected @endif >Zoroastrianism</option>
<option value="Other" @if($user->religion == "Other") selected @endif >Other</option>