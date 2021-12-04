const state = 0;

const reducer = (state, action)=>{
        if(action.type === "increment"){
            return state + action.payload
        }
        else if(action.type === "decrement"){
            return state - action.payload;
        }
        else{
            return state
        }
}

export default reducer