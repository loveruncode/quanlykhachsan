const users = [
    {
        id: 1,
        avatar: 'sadhsabdhba',
        name: 'Nguyen Van A',
        email: 'vana@example.com',
        phone: '03488484848448',
        address: 'HCM',
        birthday: '2024-04-04'
    },
    {
        id: 2,
        avatar: 'sadhsabdhba',
        name: 'Tran Thi B',
        email: 'tranb@example.com',
        phone: '03488484848448',
        address: 'HCM',
        birthday: '2024-04-04'
    }
];
//  Mock Api
export const getUsers = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(users);
        }, 500); // Giả lập delay như thực tế
    });
};

export const getUserById = (id) => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            const user = users.find((user) => user.id === parseInt(id));
            if (user) {
                resolve(user);
            } else {
                reject(new Error('User not found'));
            }
        }, 500); // Giả lập delay như thực tế
    });
};
