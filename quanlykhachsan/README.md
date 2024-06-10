# Quản lý khách sạn UI

## Prerequisites

-   Node.js
-   npm hoặc yarn

## Installation

Clone repository bằng giao thức HTTPS

```sh
git clone https://github.com/loveruncode/quanlykhachsan.git
```

Clone repository bằng giao thức SSH

```sh
git clone git@github.com:loveruncode/quanlykhachsan.git
```

```sh
cd quanlykhachsan/quanlykhachsan
```

```sh
npm i
```

nếu dùng WindowsOS thì có thể gõ lệnh `cp .env.exmaple .env` trên wsl hoặc git bash, nếu dùng MacOs hay Ubuntu.... thì cứ dùng terminal

```sh
# create env
cp .env.example .env
```

## How to use components

### Button

các tham số mà Button có thể nhận:

```
 to, href, primary = false, outline = false, text = false, rounded = false, disabled = false,
 small = false, large = false, children, className, leftIcon, rightIcon, onClick, ...passProps
```

```sh
# Button là từ components/Button

# chuyển hướng từ trang này ra trang của người khác
import Button from '../Button';

export default function Emaxaple() {
    return(
        <>
            <Button href="https://example.com">Click Me!</Button>
        </>
    )
}
```

```sh
# chuyển hướng trong trang
import Button from '../Button';

export default function Emaxaple() {
    return(
        <>
            <Button to='/example'>Click Me!</Button>
        </>
    )
}
```

```sh
# đổi sang màu Primary
import Button from '../Button';

export default function Emaxaple() {
    return(
        <>
            <Button primary>Click Me!</Button>
        </>
    )
}
```

```sh
# muốn btn hiện out line khi hover sẽ lấp đầy ô btn
import Button from '../Button';

export default function Emaxaple() {
    return(
        <>
            <Button outline>Click Me!</Button>
        </>
    )
}
```

.... tự tìm hiểu nha =))) nhiều quá

### Modal

các tham số mà Modal có thể nhận:

```
isOpen, title, closeModal, children, className
```

```sh
# có thể nhận className từ bên ngoài để css cho modal để phù hợp với trang

import { useState } from 'react';
# Button là từ components/Button
import Button from '../Button';
# Modal là từ components/Modal
import Modal from '../Modal';
export default function Emaxaple() {
    # mặc định ban đầu IsOpen sẽ false
    # nếu đang dev bên trng modal có thể cho nó là true đễ dễ dàng fix
    const [isOpen, setOpen] = useState(false);

    # hàm để setOpen = true
    const openModal = () => {
        setOpen(true);
    };

    # hàm để setOpen = false để tắt Modal
    const closeModal = () => {
        setOpen(false);
    };
    return (
        <>
            <Button onClick={openModal}>Click Me!</Button>

            <Modal isOpen={isOpen} title="Example Title" closeModal={closeModal}>
                # ghi gì vào đây cũng đc
            </Modal>
        </>
    );
}
```

### Custom Hooks

-   useDebounce
-   useIsmobile

Các hook này có thể được sử dụng để xử lý các chức năng đặc biệt như debounce input hoặc kiểm tra xem thiết bị có phải là di động hay không.
