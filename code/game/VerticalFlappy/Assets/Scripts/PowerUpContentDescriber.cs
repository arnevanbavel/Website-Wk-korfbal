using UnityEngine;
using System.Collections;

public class PowerUpContentDescriber : MonoBehaviour {

	HUDBuilder hud;
	private SpriteRenderer spriteRenderer;
	public Sprite sprite1;
	public Sprite sprite2;
	public float smallifierPercent = 0.25f;
	public int TimeIncreaser = 5;
	public int ScoreIncreaser = 10;
	public GameObject RefYellow;

	void OnTriggerEnter2D(Collider2D other)
	{
		hud = GameObject.Find("Main Camera").GetComponent<HUDBuilder>();
		if (other.tag == "Player") 
		{
			spriteRenderer = other.GetComponent<SpriteRenderer>();

			if (spriteRenderer.sprite == null) 
			{
				spriteRenderer.sprite = sprite1;
			} 
			if (other.name == "SmallifierBall")
			{
				mShrinkUpgrade(other);
			}
			if (this.name == "RefBall")
			{
				other.GetComponent<CharacterHitCalculator>().PlayerLives = 1;
				RefYellow.SetActive(false);
			}
			if (this.name == "GhostBall") 
			{
				mEnabeler(other);
			}
			if (this.name == "TimerBall")
			{
				hud.TimerIncrease(TimeIncreaser);			
			}
			if (this.name == "Goal")
			{
				hud.TimerReset();
			}
			hud.IncreaseScore(ScoreIncreaser);
			Destroy(this.gameObject);
		}
	}

	IEnumerator mEnabeler(Collider2D other)
	{			
		mChangeTheDamnSprite ();
		other.collider2D.enabled = false;
		yield return new WaitForSeconds(2f);
		other.collider2D.enabled = true;
		mChangeTheDamnSprite ();

	}

	void mShrinkUpgrade(Collider2D other)
	{
		other.animation.Play("ShrinkingUpgrade");
		other.transform.localScale = new Vector3 (smallifierPercent, smallifierPercent, smallifierPercent);
	}

	void mChangeTheDamnSprite ()
	{
		if (spriteRenderer.sprite == sprite1) // if the spriteRenderer sprite = sprite1 then change to sprite2
		{
			spriteRenderer.sprite = sprite2;
		}
		else
		{
			spriteRenderer.sprite = sprite1; // otherwise change it back to sprite1
		}
	}
}
