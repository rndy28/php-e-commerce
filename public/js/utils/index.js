export function toRp(money) {
    const formattedMoney = new Intl.NumberFormat('id').format(money);

    return `Rp${formattedMoney}`
}

export function toNormalNum(num){
    let n = num.replace('Rp', '');
    n = n.includes('.') ? n.split('.') : n?.split('')?.filter(x => Number(x))?.toString()?.replace(/,/g, '');
    n = n[0] + n[1] + n[2]
    n = parseInt(n)

    return n
}

export function Counter(){
    let initial = 1
    return {
        increment: () => initial++,
        decrement: () => initial--,
        getInitial: () => initial,
        reset: () => initial = 1,
        setInitial: (num) => initial = +num
    }
}