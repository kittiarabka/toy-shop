<?php

session_start();
date_default_timezone_set('Asia/Novokuznetsk');

/* Один файл. Базы нет: карточки и корзина живут в сессии этого браузера. */

function h($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function toys()
{
    return [
        ['id' => 'kakao', 'photo' => 'kakao.jpg', 'name' => 'Мишка Какао', 'tagline' => 'Плюш цвета какао и вязаный шарф.', 'description' => 'Какао смотрит прямо и сидит плотно: его ставят на полку или кладут в кровать. Шарф связан отдельно и не отстёгивается. Лицо вышито, пластиковых глаз нет.', 'story' => 'Имя взяли от цвета меха. Какао — первый, кого берут в руки на столе: он самый тёплый на вид.', 'price' => 2490, 'size' => 28, 'age' => '0+', 'material' => 'плюш', 'shelf' => 'bears'],
        ['id' => 'sakhar', 'photo' => 'sakhar.jpg', 'name' => 'Зайка Сахар', 'tagline' => 'Длинные уши, розовый нос, светлый мех.', 'description' => 'Сахар сшит из очень светлого плюша. Уши длинные и мягкие, их можно завязать узлом. Нос и ресницы вышиты, ничего не отстёгивается.', 'story' => 'Сахар любит узкие места: сумку, сапожок, угол дивана. Поэтому уши сделаны так, чтобы не ломаться в узле.', 'price' => 2790, 'size' => 34, 'age' => '0+', 'material' => 'плюш', 'shelf' => 'ears'],
        ['id' => 'ryabina', 'photo' => 'ryabina.jpg', 'name' => 'Лисёнок Рябина', 'tagline' => 'Рыжая пряжа, белые щёки и синий воротник.', 'description' => 'Рябина связана крючком: острые уши, белые щёки и отдельный воротник. Нитки плотные, набивка не просвечивает. Для детей от трёх лет.', 'story' => 'Рябина — лесная. Воротник добавили, чтобы лисёнок не выглядел голым в новокузнецкую зиму.', 'price' => 2690, 'size' => 30, 'age' => '3+', 'material' => 'пряжа, крючок', 'shelf' => 'forest'],
        ['id' => 'tuman', 'photo' => 'tuman.jpg', 'name' => 'Кот Туман', 'tagline' => 'Тканевый кот в розовой кофте.', 'description' => 'Туман сшит из плотного хлопка и сидит сам. Кофта и юбка пришиты, не снимаются. Морда вышита нитью: глаза, нос, усы и румянец.', 'story' => 'Туман живёт сидя. Его место — спинка кресла или подоконник, где он не заваливается на бок.', 'price' => 2390, 'size' => 26, 'age' => '0+', 'material' => 'хлопок', 'shelf' => 'forest'],
        ['id' => 'oblako', 'photo' => 'oblako.jpg', 'name' => 'Слон Облако', 'tagline' => 'Полосатый, с большим хоботом и ушами.', 'description' => 'Облако связан крючком полосками голубого, сиреневого и мяты. Уши широкие, хобот мягкий и не торчит жёстко. Его удобно обнимать целиком.', 'story' => 'Самый объёмный в коллекции. Полоски кладём так, чтобы каждая игрушка чуть отличалась от предыдущей.', 'price' => 3190, 'size' => 32, 'age' => '0+', 'material' => 'пряжа, крючок', 'shelf' => 'ears'],
        ['id' => 'iney', 'photo' => 'iney.jpg', 'name' => 'Пингвин Иней', 'tagline' => 'Белый живот, жёлтый клюв, глухие крылья.', 'description' => 'Иней из короткого плюша. Крылья пришиты наглухо, клюв и лапы не отстёгиваются. Стоит на ровной поверхности и хорошо держит форму.', 'story' => 'Иней шьём парой настроения: один чуть крупнее, второй умещается в ладонь. В заказ кладём того, что на фото.', 'price' => 2290, 'size' => 24, 'age' => '3+', 'material' => 'плюш', 'shelf' => 'winter'],
        ['id' => 'varezhka', 'photo' => 'varezhka.jpg', 'name' => 'Овечка Варежка', 'tagline' => 'Буклированная шерсть и белая мордочка.', 'description' => 'Варежка связана из пушистой пряжи: кудри не ложатся даже в сумке. Мордочка, уши и копыта — плотная гладь. Помещается в детский обхват.', 'story' => 'Имя от варежки, в которую она почти влезает. Бирюзовая — основная, оранжевая сестра шьётся по записи.', 'price' => 2190, 'size' => 22, 'age' => '0+', 'material' => 'буклированная пряжа', 'shelf' => 'winter'],
        ['id' => 'persik', 'photo' => 'persik.jpg', 'name' => 'Дракончик Персик', 'tagline' => 'Зелёный гребень и совсем не страшный.', 'description' => 'Персик связан крючком: круглый живот, жёлтый гребень вдоль спины и короткие крылья. Глаза вышиты. Его берут в дорогу, он не колючий.', 'story' => 'Персик для сказки на ночь. Гребень сделан другим цветом, чтобы его было видно даже в полутьме.', 'price' => 3390, 'size' => 29, 'age' => '3+', 'material' => 'пряжа, крючок', 'shelf' => 'tale'],
    ];
}

function toy($id)
{
    foreach (toys() as $item) {
        if ($item['id'] === $id) {
            return $item;
        }
    }
    return null;
}

function money($rub)
{
    return number_format((int) $rub, 0, ',', ' ') . ' ₽';
}

function age_label($age)
{
    return $age === '0+' ? 'с рождения' : 'от 3 лет';
}

function when_local($timestamp)
{
    $months = [1 => 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
    $month = $months[(int) date('n', $timestamp)] ?? '';
    return date('j', $timestamp) . ' ' . $month . ' в ' . date('H:i', $timestamp);
}

function text_post($key)
{
    $value = $_POST[$key] ?? '';
    if (!is_string($value)) {
        return '';
    }
    $value = preg_replace('/[\x00-\x1F]+/u', ' ', $value) ?? '';
    return trim(preg_replace('/\s+/u', ' ', $value) ?? '');
}

function csrf()
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf'];
}

function csrf_input()
{
    return '<input type="hidden" name="csrf" value="' . h(csrf()) . '">';
}

function csrf_ok()
{
    $sent = $_POST['csrf'] ?? '';
    $real = $_SESSION['csrf'] ?? '';
    return is_string($sent) && is_string($real) && $real !== '' && hash_equals($real, $sent);
}

function go($next)
{
    header('Location: index.php?page=' . $next);
    exit;
}

function safe_next($next)
{
    if (is_string($next) && preg_match('/^toy&id=[a-z0-9-]+$/', $next)) {
        return $next;
    }
    if (is_string($next) && in_array($next, ['home', 'catalog', 'atelier', 'cart', 'profile', 'journal'], true)) {
        return $next;
    }
    return 'profile';
}

function users()
{
    return (isset($_SESSION['users']) && is_array($_SESSION['users'])) ? $_SESSION['users'] : [];
}

function save_user($user)
{
    $all = users();
    $all[$user['id']] = $user;
    $_SESSION['users'] = $all;
}

function user()
{
    $id = $_SESSION['uid'] ?? '';
    $all = users();
    return (is_string($id) && isset($all[$id])) ? $all[$id] : null;
}

function find_email($email)
{
    foreach (users() as $person) {
        if (strcasecmp($person['email'], $email) === 0) {
            return $person;
        }
    }
    return null;
}

function cart()
{
    return (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) ? $_SESSION['cart'] : [];
}

function cart_count()
{
    return array_sum(array_map('intval', cart()));
}

function cart_lines()
{
    $lines = [];
    foreach (cart() as $id => $qty) {
        $lines[] = ['id' => (string) $id, 'qty' => (int) $qty, 'toy' => toy((string) $id)];
    }
    return $lines;
}

function cart_total()
{
    $total = 0;
    foreach (cart_lines() as $line) {
        if ($line['toy']) {
            $total += $line['toy']['price'] * $line['qty'];
        }
    }
    return $total;
}

function flash($message = null)
{
    if ($message !== null) {
        $_SESSION['flash'] = $message;
        return '';
    }
    $message = $_SESSION['flash'] ?? '';
    unset($_SESSION['flash']);
    return is_string($message) ? $message : '';
}

function frame($item, $class = '')
{
    $className = trim('frame ' . $class);
    return '<span class="' . h($className) . '"><img src="img/' . h($item['photo']) . '" alt="' . h($item['name']) . '"></span>';
}

function card($item)
{
    echo '<a class="toy" href="index.php?page=toy&id=' . h($item['id']) . '">';
    echo frame($item);
    echo '<div class="toy-copy"><h2>' . h($item['name']) . '</h2><p>' . h($item['tagline']) . '</p></div>';
    echo '<div class="toy-meta"><span>' . (int) $item['size'] . ' см · ' . h(age_label($item['age'])) . '</span>';
    echo '<span class="price">' . h(money($item['price'])) . '</span></div></a>';
}

function field($label, $name, $value, $type = 'text', $attrs = [])
{
    echo '<label class="field">' . h($label);
    if ($type === 'textarea') {
        echo '<textarea name="' . h($name) . '"';
        foreach ($attrs as $key => $attr) {
            echo ' ' . h($key) . '="' . h($attr) . '"';
        }
        echo '>' . h($value) . '</textarea>';
    } else {
        echo '<input name="' . h($name) . '" type="' . h($type) . '" value="' . h($value) . '"';
        foreach ($attrs as $key => $attr) {
            echo ' ' . h($key) . '="' . h($attr) . '"';
        }
        echo '>';
    }
    echo '</label>';
}

function open_orders()
{
    $count = 0;
    foreach (users() as $person) {
        foreach ($person['orders'] as $order) {
            if ($order['status'] === 'Принят') {
                $count++;
            }
        }
    }
    return $count;
}

function head_page($title, $active)
{
    $person = user();
    echo '<!DOCTYPE html><html lang="ru"><head><meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<title>' . h($title) . '</title>';
    echo '<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 32 32\'%3E%3Crect width=\'32\' height=\'32\' rx=\'9\' fill=\'%238a3038\'/%3E%3Ccircle cx=\'11\' cy=\'12\' r=\'3.4\' fill=\'%23f3ecdf\'/%3E%3Ccircle cx=\'21\' cy=\'12\' r=\'3.4\' fill=\'%23f3ecdf\'/%3E%3Cellipse cx=\'16\' cy=\'20\' rx=\'8\' ry=\'6.5\' fill=\'%23f3ecdf\'/%3E%3C/svg%3E">';
    echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,620;1,9..144,520;1,9..144,640&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">';
    echo '<link rel="stylesheet" href="style.css"></head><body><div class="shell">';
    echo '<header class="header"><a class="brand" href="index.php"><span class="brand-mark">облачко</span><span class="brand-city">ателье · новокузнецк</span></a>';
    echo '<nav class="nav">';
    foreach (['catalog' => 'Коллекция', 'atelier' => 'Ателье', 'cart' => 'Корзина'] as $id => $label) {
        echo '<a class="' . ($active === $id ? 'is' : '') . '" href="index.php?page=' . $id . '">' . $label;
        if ($id === 'cart' && cart_count() > 0) {
            echo '<span class="count">' . cart_count() . '</span>';
        }
        echo '</a>';
    }
    if ($person && $person['role'] === 'owner') {
        echo '<a class="' . ($active === 'journal' ? 'is' : '') . '" href="index.php?page=journal">Журнал';
        if (open_orders() > 0) {
            echo '<span class="count">' . open_orders() . '</span>';
        }
        echo '</a>';
    }
    if ($person) {
        echo '<a class="who' . ($active === 'profile' ? ' is' : '') . '" href="index.php?page=profile">' . h($person['name']) . '</a>';
    } else {
        echo '<a class="' . ($active === 'login' ? 'is' : '') . '" href="index.php?page=login">Войти</a>';
    }
    echo '</nav></header><main id="content">';
}

function foot_page()
{
    echo '</main><footer class="footer">';
    echo '<div><p class="footer-mark">облачко</p><p>Ателье мягких игрушек<br>Новокузнецк, каждый день 11:00–19:00</p></div>';
    echo '<div><p class="footer-label">Мастерская</p><a href="index.php?page=atelier">Профиль ателье</a><a href="index.php?page=catalog">Коллекция</a></div>';
    echo '<div><p class="footer-label">Карточка</p><a href="index.php?page=register">Регистрация</a><a href="index.php?page=login">Войти</a></div>';
    echo '<p class="credits">Снимки игрушек со свободной лицензией: Pexels; mebrett, sergey245x и Wednesday Elf (CC BY). Это не фотографии нашей мастерской.</p>';
    echo '</footer></div></body></html>';
}

$pages = ['home', 'catalog', 'toy', 'atelier', 'cart', 'register', 'login', 'profile', 'journal', 'logout'];
$page = (isset($_GET['page']) && is_string($_GET['page']) && in_array($_GET['page'], $pages, true)) ? $_GET['page'] : 'home';
$error = '';
$me = user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_ok()) {
        http_response_code(403);
        exit('Запрос отклонён.');
    }

    if ($page === 'logout') {
        unset($_SESSION['uid']);
        session_regenerate_id(true);
        go('home');
    }

    if ($page === 'register' && !$me) {
        $name = text_post('name');
        $email = mb_strtolower(text_post('email'));
        $password = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';
        $next = safe_next($_POST['next'] ?? '');
        if (mb_strlen($name) < 2 || mb_strlen($name) > 80) {
            $error = 'Имя должно быть от 2 до 80 букв.';
        } elseif (mb_strlen($email) > 120 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Почта выглядит некорректно.';
        } elseif (strlen($password) < 8 || strlen($password) > 72) {
            $error = 'Пароль должен быть от 8 до 72 символов.';
        } elseif (find_email($email)) {
            $error = 'Такая почта уже зарегистрирована.';
        } else {
            $id = bin2hex(random_bytes(8));
            save_user([
                'id' => $id,
                'email' => $email,
                'name' => $name,
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
                'phone' => '',
                'city' => '',
                'address' => '',
                'role' => users() === [] ? 'owner' : 'customer',
                'orders' => [],
                'favorites' => [],
            ]);
            session_regenerate_id(true);
            $_SESSION['uid'] = $id;
            go($next);
        }
    }

    if ($page === 'login' && !$me) {
        $email = mb_strtolower(text_post('email'));
        $password = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';
        $found = find_email($email);
        if (!$found || !password_verify($password, $found['password_hash'])) {
            $error = 'Неверная почта или пароль.';
        } else {
            session_regenerate_id(true);
            $_SESSION['uid'] = $found['id'];
            go(safe_next($_POST['next'] ?? ''));
        }
    }

    if ($page === 'toy') {
        $item = toy(isset($_GET['id']) && is_string($_GET['id']) ? $_GET['id'] : '');
        $action = text_post('action');
        if (!$item) {
            $error = 'Такой игрушки нет в коллекции.';
        } elseif ($action === 'cart') {
            $qty = (int) ($_POST['qty'] ?? 1);
            $bag = cart();
            if ($qty < 1 || $qty > 5) {
                $error = 'Количество каждой игрушки — от 1 до 5.';
            } elseif (!isset($bag[$item['id']]) && count($bag) >= 8) {
                $error = 'В корзине уже 8 разных игрушек.';
            } else {
                $bag[$item['id']] = min(5, ((int) ($bag[$item['id']] ?? 0)) + $qty);
                $_SESSION['cart'] = $bag;
                flash('Добавили в корзину.');
                go('toy&id=' . rawurlencode($item['id']));
            }
        } elseif ($action === 'favorite') {
            if (!$me) {
                go('login&next=' . rawurlencode('toy&id=' . $item['id']));
            }
            $favorites = $me['favorites'];
            if (in_array($item['id'], $favorites, true)) {
                $me['favorites'] = array_values(array_filter($favorites, function ($id) use ($item) {
                    return $id !== $item['id'];
                }));
            } elseif (count($favorites) >= 50) {
                $error = 'В избранном уже 50 игрушек.';
            } else {
                $me['favorites'][] = $item['id'];
            }
            if ($error === '') {
                save_user($me);
                go('toy&id=' . rawurlencode($item['id']));
            }
        }
    }

    if ($page === 'cart') {
        $action = text_post('action');
        if ($action === 'qty' || $action === 'remove') {
            $id = text_post('id');
            $bag = cart();
            $qty = $action === 'remove' ? 0 : (int) ($_POST['qty'] ?? 0);
            if ($qty < 1) {
                unset($bag[$id]);
            } elseif (toy($id)) {
                $bag[$id] = min(5, $qty);
            }
            $_SESSION['cart'] = $bag;
            go('cart');
        }
        if ($action === 'order') {
            $name = text_post('name');
            $phone = text_post('phone');
            $city = text_post('city');
            $address = text_post('address');
            $note = text_post('note');
            $items = [];
            $total = 0;
            foreach (cart_lines() as $line) {
                if (!$line['toy']) {
                    continue;
                }
                $items[] = ['id' => $line['toy']['id'], 'name' => $line['toy']['name'], 'price' => $line['toy']['price'], 'qty' => $line['qty']];
                $total += $line['toy']['price'] * $line['qty'];
            }
            if (!$me) {
                $error = 'Войдите, чтобы оформить заказ.';
            } elseif (mb_strlen($name) < 2) {
                $error = 'Имя должно быть от 2 до 80 букв.';
            } elseif (!preg_match('/^[0-9+()\-\s]{7,20}$/', $phone)) {
                $error = 'Телефон выглядит некорректно.';
            } elseif (mb_strlen($city) < 2 || mb_strlen($city) > 80) {
                $error = 'Укажите город.';
            } elseif (mb_strlen($address) < 5 || mb_strlen($address) > 200) {
                $error = 'Укажите адрес: улицу и дом.';
            } elseif (mb_strlen($note) > 400) {
                $error = 'Комментарий должен быть короче 400 знаков.';
            } elseif ($items === []) {
                $error = 'Корзина пуста.';
            } else {
                $order = [
                    'id' => strtoupper(bin2hex(random_bytes(4))),
                    'status' => 'Принят',
                    'total' => $total,
                    'name' => $name,
                    'phone' => $phone,
                    'city' => $city,
                    'address' => $address,
                    'note' => $note,
                    'email' => $me['email'],
                    'customer' => $me['name'],
                    'created_at' => time(),
                    'items' => $items,
                ];
                array_unshift($me['orders'], $order);
                if ($me['phone'] === '') {
                    $me['phone'] = $phone;
                }
                if ($me['city'] === '') {
                    $me['city'] = $city;
                }
                if ($me['address'] === '') {
                    $me['address'] = $address;
                }
                save_user($me);
                $_SESSION['cart'] = [];
                $_SESSION['last_order'] = $order['id'];
                go('cart&done=1');
            }
        }
    }

    if ($page === 'profile' && $me) {
        if (text_post('action') === 'profile') {
            $name = text_post('name');
            $phone = text_post('phone');
            $city = text_post('city');
            $address = text_post('address');
            if (mb_strlen($name) < 2 || mb_strlen($name) > 80) {
                $error = 'Имя должно быть от 2 до 80 букв.';
            } elseif ($phone !== '' && !preg_match('/^[0-9+()\-\s]{7,20}$/', $phone)) {
                $error = 'Телефон выглядит некорректно.';
            } elseif (mb_strlen($city) > 80 || mb_strlen($address) > 200) {
                $error = 'Проверьте город и адрес.';
            } else {
                $me['name'] = $name;
                $me['phone'] = $phone;
                $me['city'] = $city;
                $me['address'] = $address;
                save_user($me);
                flash('Карточка обновлена.');
                go('profile');
            }
        }
        if (text_post('action') === 'password') {
            $current = is_string($_POST['current'] ?? null) ? $_POST['current'] : '';
            $next = is_string($_POST['next'] ?? null) ? $_POST['next'] : '';
            if (strlen($current) < 8 || strlen($next) < 8 || strlen($next) > 72) {
                $error = 'Пароль должен быть от 8 до 72 символов.';
            } elseif (!password_verify($current, $me['password_hash'])) {
                $error = 'Текущий пароль не подошёл.';
            } else {
                $me['password_hash'] = password_hash($next, PASSWORD_DEFAULT);
                save_user($me);
                flash('Пароль изменён.');
                go('profile');
            }
        }
    }

    if ($page === 'journal' && $me && $me['role'] === 'owner') {
        $status = text_post('status');
        $id = text_post('id');
        $allowed = ['Принят', 'Собираем', 'Готов', 'Отдан'];
        if (!in_array($status, $allowed, true)) {
            $error = 'Такого статуса нет.';
        } else {
            $all = users();
            $found = false;
            foreach ($all as $uid => $person) {
                foreach ($person['orders'] as $index => $order) {
                    if ($order['id'] === $id) {
                        $all[$uid]['orders'][$index]['status'] = $status;
                        $found = true;
                    }
                }
            }
            if ($found) {
                $_SESSION['users'] = $all;
                go('journal');
            }
            $error = 'Заказ не найден.';
        }
    }
}

$me = user();
$notice = flash();
$next = safe_next($_GET['next'] ?? ($_POST['next'] ?? ''));

if ($page === 'home') {
    $featured = [];
    foreach (['oblako', 'kakao', 'ryabina'] as $id) {
        $featured[] = toy($id);
    }
    $low = min(array_column(toys(), 'price'));
    head_page('Облачко — мягкие игрушки', 'home');
    ?>
    <section class="hero">
      <div>
        <p class="kicker">ателье в Новокузнецке</p>
        <h1>Игрушки, которые держат <em>тепло</em></h1>
        <p class="lead">Шьём плюш и вяжем крючком небольшими партиями. Лица вышиты, набивка плотная, у каждой игрушки своё имя на бирке.</p>
        <div class="actions">
          <a class="button" href="index.php?page=catalog">Смотреть коллекцию</a>
          <a class="button ghost" href="index.php?page=atelier">Профиль ателье</a>
        </div>
        <p class="note"><?= count(toys()) ?> игрушек на столе · от <?= h(money($low)) ?> · шьём 3–5 дней</p>
      </div>
      <figure class="hero-photo">
        <img src="img/kakao.jpg" alt="Мишка Какао">
        <figcaption>мишка какао · 28 см</figcaption>
      </figure>
    </section>
    <div class="ticker" aria-hidden="true"><div class="ticker-track"><?php
      $names = array_map(function ($item) { return $item['name']; }, toys());
      $loop = array_merge($names, $names);
      foreach ($loop as $name) {
          echo '<span>' . h($name) . '</span>';
      }
    ?></div></div>
    <section class="letter">
      <p class="kicker">письмо из мастерской</p>
      <h2>Не артикулы, а характеры</h2>
      <div class="letter-grid">
        <p>В «Облачке» игрушка появляется из имени. Сначала выбираем, кто это: мишка, который носит шарф, лисёнок с воротником, слон в полоску. Потом уже нитки и набивка. Поэтому две Рябины не выходят одинаковыми стежок в стежок.</p>
        <p>Мастерская в Новокузнецке, каждый день с 11:00 до 19:00. Самовывоз по записи, адрес присылаем после заказа. Деньги на сайте не списываем: договариваемся, когда перезваниваем.</p>
      </div>
    </section>
    <section>
      <div class="section-head"><h2>Сейчас на столе</h2><a href="index.php?page=catalog">Вся коллекция</a></div>
      <div class="stories">
        <?php foreach ($featured as $index => $item): ?>
          <a class="story<?= $index === 1 ? ' flip' : '' ?>" href="index.php?page=toy&id=<?= h($item['id']) ?>">
            <?= frame($item, 'story-photo') ?>
            <div>
              <p class="kicker">0<?= $index + 1 ?></p>
              <h2><?= h($item['name']) ?></h2>
              <p><?= h($item['story']) ?></p>
              <span class="price"><?= h(money($item['price'])) ?></span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
    <section class="facts">
      <article><strong>Вышивка</strong><p>Глаза и носы — нить. У игрушек с рождения нет пластиковых деталей, которые можно оторвать.</p></article>
      <article><strong>3–5 дней</strong><p>Если нужного характера нет на полке, вяжем или шьём после заказа и перезваниваем.</p></article>
      <article><strong>Уход</strong><p>Пятно снимаем влажной тканью. Стирка только ручная, в холодной воде, без отжима в машине.</p></article>
      <article><strong>Новокузнецк</strong><p>Каждый день 11:00–19:00. Забрать можно у мастерской, адрес присылаем после заказа.</p></article>
    </section>
    <?php
    foot_page();
    exit;
}

if ($page === 'catalog') {
    $shelves = ['all' => 'Все', 'bears' => 'Мишки', 'ears' => 'Ушастые', 'forest' => 'Лесные', 'winter' => 'Зимние', 'tale' => 'Сказка', 'babies' => 'Малышам'];
    $shelf = (isset($_GET['shelf']) && is_string($_GET['shelf']) && isset($shelves[$_GET['shelf']])) ? $_GET['shelf'] : 'all';
    $list = toys();
    if ($shelf === 'babies') {
        $list = array_values(array_filter($list, function ($item) { return $item['age'] === '0+'; }));
    } elseif ($shelf !== 'all') {
        $list = array_values(array_filter($list, function ($item) use ($shelf) { return $item['shelf'] === $shelf; }));
    }
    head_page('Коллекция — Облачко', 'catalog');
    ?>
    <section class="page">
      <p class="kicker">полка</p>
      <h1>Коллекция</h1>
      <p class="lead">Восемь игрушек, которые сейчас шьём. Цены — за одну, срок три–пять дней.</p>
      <div class="shelves">
        <?php foreach ($shelves as $id => $label): ?>
          <a class="chip<?= $id === $shelf ? ' is' : '' ?>" href="index.php?page=catalog<?= $id === 'all' ? '' : '&shelf=' . h($id) ?>"><?= h($label) ?></a>
        <?php endforeach; ?>
      </div>
      <div class="grid">
        <?php foreach ($list as $item) { card($item); } ?>
      </div>
    </section>
    <?php
    foot_page();
    exit;
}

if ($page === 'toy') {
    $item = toy(isset($_GET['id']) && is_string($_GET['id']) ? $_GET['id'] : '');
    if (!$item) {
        http_response_code(404);
        head_page('Такой полки нет — Облачко', '');
        echo '<section class="page narrow"><p class="kicker">404</p><h1>Такой полки нет</h1><p class="lead">Игрушка могла сменить имя. Вся коллекция на месте.</p><a class="button" href="index.php?page=catalog">К коллекции</a></section>';
        foot_page();
        exit;
    }
    $loved = $me && in_array($item['id'], $me['favorites'], true);
    $labels = ['bears' => 'Мишки', 'ears' => 'Ушастые', 'forest' => 'Лесные', 'winter' => 'Зимние', 'tale' => 'Сказка'];
    head_page($item['name'] . ' — Облачко', 'catalog');
    ?>
    <article class="product">
      <?= frame($item, 'product-photo') ?>
      <div>
        <p class="kicker"><a href="index.php?page=catalog">Коллекция</a> · <?= h($labels[$item['shelf']] ?? '') ?></p>
        <h1><?= h($item['name']) ?></h1>
        <p class="lead"><?= h($item['description']) ?></p>
        <p><?= h($item['story']) ?></p>
        <dl class="specs">
          <dt>Цена</dt><dd class="price"><?= h(money($item['price'])) ?></dd>
          <dt>Рост</dt><dd><?= (int) $item['size'] ?> см</dd>
          <dt>Возраст</dt><dd><?= h(age_label($item['age'])) ?></dd>
          <dt>Ткань</dt><dd><?= h($item['material']) ?></dd>
          <dt>Наполнитель</dt><dd>холлофайбер</dd>
          <dt>Лицо</dt><dd>вышивка, без пластиковых деталей</dd>
        </dl>
        <?php if ($error !== ''): ?><p class="error"><?= h($error) ?></p><?php endif; ?>
        <?php if ($notice !== ''): ?><p class="ok"><?= h($notice) ?></p><?php endif; ?>
        <form class="buy" method="post">
          <?= csrf_input() ?>
          <input type="hidden" name="action" value="cart">
          <label class="field qty">Количество
            <select name="qty"><?php for ($n = 1; $n <= 5; $n++): ?><option value="<?= $n ?>"><?= $n ?></option><?php endfor; ?></select>
          </label>
          <button class="button" type="submit">В корзину</button>
        </form>
        <?php if ($me): ?>
          <form method="post"><?= csrf_input() ?><input type="hidden" name="action" value="favorite"><button class="button ghost" type="submit"><?= $loved ? 'В избранном' : 'В избранное' ?></button></form>
        <?php else: ?>
          <a class="button ghost" href="index.php?page=login&next=<?= rawurlencode('toy&id=' . $item['id']) ?>">В избранное</a>
        <?php endif; ?>
        <p class="note">Шьём за 3–5 дней. Заказ сохраняется в карточке покупателя.</p>
      </div>
    </article>
    <?php
    foot_page();
    exit;
}

if ($page === 'atelier') {
    head_page('Профиль ателье — Облачко', 'atelier');
    ?>
    <article class="page prose">
      <p class="kicker">профиль ателье</p>
      <h1>Облачко шьёт игрушки в Новокузнецке</h1>
      <p class="lead">Небольшая мастерская в Новокузнецке. Часть игрушек шьём из плюша, часть вяжем крючком. Партии короткие: у каждой своё имя на бирке и лицо, которое не повторяется стежок в стежок.</p>
      <h2>Как появляется игрушка</h2>
      <ol class="steps">
        <li><b>01</b><div><strong>Лицо</strong><p>Сначала вышиваем глаза и нос. Нить, не пластик: малыш может грызть ухо, и ничего не оторвётся.</p></div></li>
        <li><b>02</b><div><strong>Швы наружу</strong><p>Стачиваем детали так, чтобы шов был виден. Это старый плюшевый приём: игрушка выглядит собранной руками, а не штампом.</p></div></li>
        <li><b>03</b><div><strong>Плотная набивка</strong><p>Холлофайбер кладём так, чтобы игрушка сидела и не сдувалась через неделю объятий.</p></div></li>
        <li><b>04</b><div><strong>Бирка с именем</strong><p>Какао, Сахар, Рябина — имя пришито. В заказе оно же, чтобы вы узнали свою.</p></div></li>
      </ol>
      <h2>Мастерская</h2>
      <dl class="specs">
        <dt>Город</dt><dd>Новокузнецк</dd>
        <dt>Часы</dt><dd>каждый день, 11:00–19:00, время Новокузнецка</dd>
        <dt>Самовывоз</dt><dd>по записи, адрес присылаем после заказа</dd>
        <dt>Срок</dt><dd>3–5 дней, если шьём под заказ</dd>
        <dt>Оплата</dt><dd>договариваемся при звонке, на сайте деньги не списываем</dd>
      </dl>
      <p>Заказ из корзины попадает в журнал мастерской. Первая карточка в этом браузере становится карточкой ателье.</p>
      <div class="actions">
        <a class="button" href="index.php?page=catalog">К коллекции</a>
        <a class="button ghost" href="index.php?page=register">Завести карточку</a>
      </div>
    </article>
    <?php
    foot_page();
    exit;
}

if ($page === 'cart') {
    if (isset($_GET['done']) && !empty($_SESSION['last_order'])) {
        head_page('Заказ принят — Облачко', 'cart');
        echo '<section class="page narrow"><p class="kicker">заказ ' . h($_SESSION['last_order']) . '</p><h1>Приняли в мастерскую</h1><p class="lead">Заказ лежит в вашей карточке. Ателье видит его в журнале и перезвонит. Шьём 3–5 дней.</p><a class="button" href="index.php?page=profile">Открыть карточку</a></section>';
        foot_page();
        exit;
    }
    $form = [
        'name' => $me['name'] ?? '',
        'phone' => $me['phone'] ?? '',
        'city' => $me['city'] ?? '',
        'address' => $me['address'] ?? '',
        'note' => '',
    ];
    if ($error !== '' && $me) {
        $form = ['name' => text_post('name'), 'phone' => text_post('phone'), 'city' => text_post('city'), 'address' => text_post('address'), 'note' => text_post('note')];
    }
    head_page('Корзина — Облачко', 'cart');
    ?>
    <section class="page">
      <p class="kicker">корзина</p>
      <h1>Собранные игрушки</h1>
      <?php $lines = cart_lines(); ?>
      <?php if ($lines === []): ?>
        <p class="lead">Пока пусто. В <a href="index.php?page=catalog">коллекции</a> восемь характеров.</p>
      <?php else: ?>
        <div class="cart-layout">
          <div>
            <?php foreach ($lines as $line): ?>
              <article class="cart-line">
                <?php if ($line['toy']): ?>
                  <?= frame($line['toy'], 'mini') ?>
                  <div>
                    <h2><a href="index.php?page=toy&id=<?= h($line['toy']['id']) ?>"><?= h($line['toy']['name']) ?></a></h2>
                    <p class="note"><?= h(money($line['toy']['price'])) ?></p>
                  </div>
                <?php else: ?>
                  <div></div>
                  <p>Этой игрушки больше нет в коллекции.</p>
                <?php endif; ?>
                <div class="line-actions">
                  <?php if ($line['toy']): ?>
                    <form method="post">
                      <?= csrf_input() ?>
                      <input type="hidden" name="action" value="qty">
                      <input type="hidden" name="id" value="<?= h($line['toy']['id']) ?>">
                      <label class="field qty">Штук
                        <select name="qty" onchange="this.form.submit()">
                          <?php for ($n = 1; $n <= 5; $n++): ?><option value="<?= $n ?>"<?= $n === $line['qty'] ? ' selected' : '' ?>><?= $n ?></option><?php endfor; ?>
                        </select>
                      </label>
                    </form>
                  <?php endif; ?>
                  <form method="post"><?= csrf_input() ?><input type="hidden" name="action" value="remove"><input type="hidden" name="id" value="<?= h($line['id']) ?>"><button class="text-button" type="submit">Убрать</button></form>
                </div>
              </article>
            <?php endforeach; ?>
            <p class="total">Итого <strong><?= h(money(cart_total())) ?></strong></p>
          </div>
          <?php if ($me): ?>
            <form class="panel stack" method="post">
              <?= csrf_input() ?>
              <input type="hidden" name="action" value="order">
              <h2>Куда везти</h2>
              <?php field('Имя', 'name', $form['name'], 'text', ['required' => 'required', 'maxlength' => '80']); ?>
              <?php field('Телефон', 'phone', $form['phone'], 'tel', ['required' => 'required', 'maxlength' => '20']); ?>
              <?php field('Город', 'city', $form['city'], 'text', ['required' => 'required', 'maxlength' => '80']); ?>
              <?php field('Адрес', 'address', $form['address'], 'text', ['required' => 'required', 'maxlength' => '200']); ?>
              <?php field('Комментарий', 'note', $form['note'], 'textarea', ['maxlength' => '400']); ?>
              <?php if ($error !== ''): ?><p class="error"><?= h($error) ?></p><?php endif; ?>
              <button class="button" type="submit">Оформить заказ</button>
              <p class="note">Шьём 3–5 дней. Статус заказа будет в карточке.</p>
            </form>
          <?php else: ?>
            <div class="panel stack">
              <h2>Нужна карточка</h2>
              <p>Корзина останется в этом браузере. Чтобы оформить заказ, войдите или зарегистрируйтесь.</p>
              <a class="button" href="index.php?page=register&next=cart">Регистрация</a>
              <a class="button ghost" href="index.php?page=login&next=cart">Войти</a>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </section>
    <?php
    foot_page();
    exit;
}

if ($page === 'register') {
    if ($me) {
        go('profile');
    }
    head_page('Регистрация — Облачко', 'login');
    ?>
    <section class="page split">
      <div>
        <p class="kicker">регистрация</p>
        <h1>Карточка покупателя</h1>
        <p class="lead">В карточке живут адрес, избранные игрушки и заказы. Пароль хранится только как отпечаток.</p>
        <p class="note">Первая карточка в этом браузере становится карточкой ателье: в ней открывается журнал заказов. Следующие — покупательские. База ещё не подключена, поэтому карточка живёт, пока открыт браузер.</p>
      </div>
      <form class="panel stack" method="post">
        <?= csrf_input() ?>
        <input type="hidden" name="next" value="<?= h($next) ?>">
        <?php field('Имя', 'name', text_post('name'), 'text', ['required' => 'required', 'maxlength' => '80']); ?>
        <?php field('Почта', 'email', text_post('email'), 'email', ['required' => 'required', 'maxlength' => '120']); ?>
        <?php field('Пароль', 'password', '', 'password', ['required' => 'required', 'minlength' => '8', 'maxlength' => '72']); ?>
        <p class="note">От 8 символов. Это пароль только для «Облачка».</p>
        <?php if ($error !== ''): ?><p class="error"><?= h($error) ?></p><?php endif; ?>
        <button class="button" type="submit">Создать карточку</button>
        <p class="note">Уже есть карточка? <a href="index.php?page=login&next=<?= rawurlencode($next) ?>">Войти</a></p>
      </form>
    </section>
    <?php
    foot_page();
    exit;
}

if ($page === 'login') {
    if ($me) {
        go('profile');
    }
    head_page('Вход — Облачко', 'login');
    ?>
    <section class="page split">
      <div>
        <p class="kicker">вход</p>
        <h1>С возвращением</h1>
        <p class="lead">Карточка помнит ваши заказы и полку избранного, пока открыт этот браузер.</p>
        <p class="note">Нет карточки? <a href="index.php?page=register&next=<?= rawurlencode($next) ?>">Зарегистрируйтесь</a></p>
      </div>
      <form class="panel stack" method="post">
        <?= csrf_input() ?>
        <input type="hidden" name="next" value="<?= h($next) ?>">
        <?php field('Почта', 'email', text_post('email'), 'email', ['required' => 'required']); ?>
        <?php field('Пароль', 'password', '', 'password', ['required' => 'required']); ?>
        <?php if ($error !== ''): ?><p class="error"><?= h($error) ?></p><?php endif; ?>
        <button class="button" type="submit">Войти</button>
      </form>
    </section>
    <?php
    foot_page();
    exit;
}

if ($page === 'profile') {
    if (!$me) {
        go('login&next=profile');
    }
    head_page('Карточка — Облачко', 'profile');
    ?>
    <section class="page">
      <p class="kicker"><?= $me['role'] === 'owner' ? 'карточка ателье' : 'карточка покупателя' ?></p>
      <div class="title-row">
        <h1><?= h($me['name']) ?></h1>
        <form method="post" action="index.php?page=logout"><?= csrf_input() ?><button class="button ghost" type="submit">Выйти</button></form>
      </div>
      <p class="note">Почта для входа: <?= h($me['email']) ?>.</p>
      <?php if ($me['role'] === 'owner'): ?><p><a class="button" href="index.php?page=journal">Журнал заказов мастерской</a></p><?php endif; ?>
      <?php if ($notice !== ''): ?><p class="ok"><?= h($notice) ?></p><?php endif; ?>
      <?php if ($error !== ''): ?><p class="error"><?= h($error) ?></p><?php endif; ?>
      <div class="profile">
        <div class="stack">
          <form class="panel stack" method="post">
            <?= csrf_input() ?>
            <input type="hidden" name="action" value="profile">
            <h2>Адрес и имя</h2>
            <?php field('Имя', 'name', $me['name'], 'text', ['required' => 'required', 'maxlength' => '80']); ?>
            <?php field('Телефон', 'phone', $me['phone'], 'tel', ['maxlength' => '20']); ?>
            <?php field('Город', 'city', $me['city'], 'text', ['maxlength' => '80']); ?>
            <?php field('Адрес', 'address', $me['address'], 'text', ['maxlength' => '200']); ?>
            <button class="button" type="submit">Сохранить</button>
          </form>
          <form class="panel stack" method="post">
            <?= csrf_input() ?>
            <input type="hidden" name="action" value="password">
            <h2>Пароль</h2>
            <?php field('Текущий пароль', 'current', '', 'password', ['required' => 'required']); ?>
            <?php field('Новый пароль', 'next', '', 'password', ['required' => 'required', 'minlength' => '8']); ?>
            <button class="button ghost" type="submit">Сменить пароль</button>
          </form>
        </div>
        <div class="stack">
          <section>
            <h2>Заказы</h2>
            <?php if ($me['orders'] === []): ?>
              <p class="note">Пока пусто. Начните с <a href="index.php?page=catalog">коллекции</a>.</p>
            <?php else: foreach ($me['orders'] as $order): ?>
              <article class="order">
                <div>
                  <h3 class="serif">№ <?= h($order['id']) ?></h3>
                  <p class="note"><?= h(when_local((int) $order['created_at'])) ?> · время Новокузнецка</p>
                  <ul>
                    <?php foreach ($order['items'] as $piece): ?><li><?= h($piece['name']) ?> × <?= (int) $piece['qty'] ?></li><?php endforeach; ?>
                  </ul>
                  <p><?= h($order['city']) ?>, <?= h($order['address']) ?></p>
                </div>
                <div>
                  <p><?= h($order['status']) ?></p>
                  <p class="price"><?= h(money($order['total'])) ?></p>
                </div>
              </article>
            <?php endforeach; endif; ?>
          </section>
          <section>
            <h2>Избранное</h2>
            <?php
            $favorites = [];
            foreach ($me['favorites'] as $favId) {
                $fav = toy((string) $favId);
                if ($fav) {
                    $favorites[] = $fav;
                }
            }
            ?>
            <?php if ($favorites === []): ?>
              <p class="note">Отмечайте игрушки на их странице — они соберутся здесь.</p>
            <?php else: ?>
              <div class="grid"><?php foreach ($favorites as $fav) { card($fav); } ?></div>
            <?php endif; ?>
          </section>
        </div>
      </div>
    </section>
    <?php
    foot_page();
    exit;
}

if ($page === 'journal') {
    if (!$me || $me['role'] !== 'owner') {
        http_response_code(404);
        head_page('Такой полки нет — Облачко', '');
        echo '<section class="page narrow"><p class="kicker">404</p><h1>Такой полки нет</h1><p class="lead">Журнал открыт только карточке ателье.</p><a class="button" href="index.php">На главную</a></section>';
        foot_page();
        exit;
    }
    $orders = [];
    foreach (users() as $person) {
        foreach ($person['orders'] as $order) {
            $order['customer'] = $person['name'];
            $order['email'] = $person['email'];
            $orders[] = $order;
        }
    }
    usort($orders, function ($a, $b) { return $b['created_at'] <=> $a['created_at']; });
    head_page('Журнал мастерской — Облачко', 'journal');
    ?>
    <section class="page">
      <p class="kicker">только для ателье</p>
      <h1>Журнал заказов</h1>
      <p class="lead"><?= open_orders() > 0 ? 'Новых, со статусом «Принят»: ' . open_orders() . '.' : 'Новых заказов нет.' ?> Телефоны и адреса видны только в этой карточке.</p>
      <?php if ($error !== ''): ?><p class="error"><?= h($error) ?></p><?php endif; ?>
      <?php if ($orders === []): ?>
        <p>Когда покупатель оформит корзину, заказ появится здесь.</p>
      <?php else: foreach ($orders as $order): ?>
        <article class="order">
          <div>
            <h2>№ <?= h($order['id']) ?></h2>
            <p class="note"><?= h(when_local((int) $order['created_at'])) ?> · время Новокузнецка</p>
            <p><?= h($order['customer']) ?> · <?= h($order['email']) ?></p>
            <p><?= h($order['name']) ?>, <?= h($order['phone']) ?></p>
            <p><?= h($order['city']) ?>, <?= h($order['address']) ?></p>
            <?php if ($order['note'] !== ''): ?><p class="note"><?= h($order['note']) ?></p><?php endif; ?>
            <ul>
              <?php foreach ($order['items'] as $piece): ?><li><?= h($piece['name']) ?> × <?= (int) $piece['qty'] ?> · <?= h(money($piece['price'])) ?></li><?php endforeach; ?>
            </ul>
          </div>
          <div class="stack">
            <p class="price"><?= h(money($order['total'])) ?></p>
            <form class="status" method="post">
              <?= csrf_input() ?>
              <input type="hidden" name="id" value="<?= h($order['id']) ?>">
              <?php foreach (['Принят', 'Собираем', 'Готов', 'Отдан'] as $status): ?>
                <button type="submit" name="status" value="<?= h($status) ?>" aria-pressed="<?= $order['status'] === $status ? 'true' : 'false' ?>"><?= h($status) ?></button>
              <?php endforeach; ?>
            </form>
          </div>
        </article>
      <?php endforeach; endif; ?>
    </section>
    <?php
    foot_page();
    exit;
}

go('home');
