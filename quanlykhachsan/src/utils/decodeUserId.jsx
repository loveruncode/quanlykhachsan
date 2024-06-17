const decodeUserId = (encodedId) => {
    const decoded = atob(encodedId); // decode from base64
    const id = decoded.substring(6, decoded.length - 13); // remove randomString and Date.now()
    return id;
};
export default decodeUserId;
