## Dynamic Programming Approach:
### Initialization:
Create a DP array where dp[i] represents the maximum amount of money that can be robbed from the first i houses.

Base Cases:
- If there's only one house, rob it: dp[0] = houses[0].
- For two houses, rob the one with more money: dp[1] = max(houses[0], houses[1]).

Recursive Relation:
- For each subsequent house, decide whether to rob it or not. The formula is:
```dp[i] = max(dp[i-1], houses[i] + dp[i-2])```
- This means the max money up to house i is either the same as i-1 (if we don't rob house i), or the money in house i plus the best solution up to i-2.