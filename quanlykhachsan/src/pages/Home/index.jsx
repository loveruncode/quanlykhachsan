import { useState, useEffect } from 'react';

export default function Home() {
  const [data, setData] = useState([]);
  const endpoint = 'admin';

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(`${import.meta.env.VITE_url}/${endpoint}`);
        const jsonData = await response.json();
        setData(jsonData);
      } catch (error) {
        console.error('lỗi fetch ', error);
      }
    };

    fetchData();
  }, [endpoint]);

  return (
    <>
      {data.map((item) => (
        <div key={item.id}>{item.name} {item.phone}</div>
      ))}
    </>
  );
}
