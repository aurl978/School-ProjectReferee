<?php

class Verification
{
    public function notEmpty(...$VarToCheck)
    {
        $bool = true;
        for ($i = 0; $i < count($VarToCheck); $i++) {
            if (isset($VarToCheck[$i]) AND !empty($VarToCheck[$i])) {
                $bool = true;
            } else {
                $bool = false;
                $i = count($VarToCheck);
            }
        }
        return ($bool === true) ? true : false;
    }

    public function isPassTrue($PasswordToTest, $OriginalPassword)
    {
        if ($this->notEmpty($PasswordToTest, $OriginalPassword)) {
            return (password_verify($PasswordToTest, $OriginalPassword)) ? true : false;
        }
    }

    public function isMail($mail)
    {
        if ($this->notEmpty($mail)) {
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                if (strlen($mail) < 254) {
                    $IsNotASCII = 'ďđēĕėęěĝğġģĥħĩīĭįıĵķĺļľŀłńņňŉŋōŏőoeŕŗřśŝsťŧ';
                    $IsNotASCII .= 'ďđēĕėęěĝğġģĥħĩīĭįıĵķĺļľŀłńņňŉŋōŏőoeŕŗřśŝsťŧ';
                    $IsNotASCII .= 'ũūŭůűųŵŷźżztșțΐάέήίΰαβγδεζηθικλμνξοπρςστυφ';
                    $IsNotASCII .= 'χψωϊϋόύώабвгдежзийклмнопрстуфхцчшщъыьэюяt';
                    $IsNotASCII .= 'ἀἁἂἃἄἅἆἇἐἑἒἓἔἕἠἡἢἣἤἥἦἧἰἱἲἳἴἵἶἷὀὁὂὃὄὅὐὑὒὓὔ';
                    $IsNotASCII .= 'ὕὖὗὠὡὢὣὤὥὦὧὰάὲέὴήὶίὸόὺύὼώᾀᾁᾂᾃᾄᾅᾆᾇᾐᾑᾒᾓᾔᾕᾖᾗ';
                    $IsNotASCII .= 'ᾠᾡᾢᾣᾤᾥᾦᾧᾰᾱᾲᾳᾴᾶᾷῂῃῄῆῇῐῑῒΐῖῗῠῡῢΰῤῥῦῧῲῳῴῶῷ';
                    $syntax = "#^[[:alnum:][:punct:]]{1,64}@[[:alnum:]-.$IsNotASCII]{2,253}\.[[:alpha:].]{2,6}$#";
                    return preg_match($syntax, $mail) ? true : false;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function isEquals($FirstVar, $SecondVar)
    {
        if ($this->notEmpty($FirstVar, $SecondVar)) {
            return ($FirstVar === $SecondVar) ? true : false;
        } else {
            return false;
        }
    }

}