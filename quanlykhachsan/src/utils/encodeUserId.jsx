const encodeUserId = (id) => {
    const randomString = Math.random().toString(36).substring(7);
    return btoa(randomString + id + Date.now()); // encode to base64
};
export default encodeUserId;
