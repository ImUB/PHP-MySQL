  <?php
    $numbers = [18,7,20,1];
    sort($numbers);
    print "<PRE>";
    print_r($numbers);
    print "</PRE>";

    rsort($numbers);
    print "<PRE>";
    print_r($numbers);
    print "</PRE>";
    # sort 오름차순 rsort 내림차순 ksort는 키를 이용한 오름차순 krsort는 키를 이용한 내림차순

    $data = ["apple", "ggul", "gam"];
    array_push($data, "없음","수박");
    print "<PRE>";
    print_r($data);
    print "</PRE>";
    # array_push 활용 배열에 끝에 데이터 추가 array_pop은 끝 데이터 삭제
    # array_unshift는 배열의 맨앞에 데이터 추가 array_shift는 맨앞에 데이터 삭제

    $data = ["tv1" => "500", "tv2" => "1000", "radio1" => "800"];
    $add_data = ["tv1" => "2000", "tv2" => "100", "radio2" => "200"];

    $result = array_merge($data, $add_data);
    print "<PRE>";
    print_r($result);
    print "</PRE>";
    $data = ["tv1" => "500", "tv2" => "1000", "radio1" => "800"];
    $add_data = ["tv1" => "2000", "tv2" => "100", "radio2" => "200"];
    $result = $data + $add_data;
    print "<PRE>";
    print_r($result);
    print "</PRE>";
    # + 연산과 array_merge는 다른 연산임 결과값보고 확인 바람
    $data = ["A", "B", "C", "D", "E", "F"];
    $result = array_slice($data,2,-2);
    print implode(',', $result);
    # 문자열자르기는 해보면서 익히길 array_slice(뽑을데이터, 시작위치, 길이)
    ?>
